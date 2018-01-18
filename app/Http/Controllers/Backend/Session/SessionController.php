<?php

namespace App\Http\Controllers\Backend\Session;

use DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Room\Room;
use App\Models\Session\Session;
use App\Models\Session\SessionGroup;
use App\Models\Subject\Subject;
use App\Models\Teacher\Teacher;
use App\Repositories\Backend\Session\SessionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Session\ManageSessionRequest;
use App\Http\Requests\Backend\Session\StoreSessionRequest;
use App\Http\Requests\Backend\Session\UpdateSessionRequest;

class SessionController extends Controller
{
    /**
     * @var SessionRepository
     */
    protected $sessions;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(SessionRepository $sessions)
    {
        $this->sessions = $sessions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageSessionRequest $request)
    {
        return view('backend.session.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session = new Session();
        $sessionGroup = new SessionGroup();

        $locations = Location::all()->pluck('name', 'id');
        $rooms = Room::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('name', 'id');
        $courses = Course::all()->pluck('name', 'id');
        $subjects = Subject::all()->pluck('name', 'id');
        $teachers = Teacher::all()->pluck('name', 'id');

        return view('backend.session.create')->with(compact('session', 'sessionGroup', 'locations', 'rooms', 'batches', 'courses', 'subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Session\StoreSessionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionRequest $request)
    {
        $this->save($request);

        return redirect()->route('admin.sessions.index')->withFlashSuccess(trans('alerts.backend.sessions.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        return view('backend.session.show')->withSession($session);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        $sessionGroup = isset($session->group) ? $session->group : new SessionGroup();
        $locations = Location::all()->pluck('name', 'id');
        $rooms = Room::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('name', 'id');
        $courses = Course::all()->pluck('name', 'id');
        $subjects = Subject::all()->pluck('name', 'id');
        $teachers = Teacher::all()->pluck('name', 'id');

        $repeating = isset($session->group);
        $course = $session->course()->pluck('name','id');

        return view('backend.session.edit')
            ->with(compact(
                'session',
                'sessionGroup',
                'locations',
                'rooms',
                'batches',
                'courses',
                'subjects',
                'teachers',
                'repeating',
                'course'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Session\UpdateSessionRequest  $request
     * @param  \App\Models\Session\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Session $session, UpdateSessionRequest $request)
    {
        $this->save($request, $session);
        return redirect()->route('admin.sessions.index')->withFlashSuccess(trans('alerts.backend.sessions.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Session $session
     * @param $status
     * @param ManageSessionRequest $request
     *
     * @return mixed
     */
    public function mark(Session $session, $status, ManageSessionRequest $request)
    {
        $session->update(['status' => $status]);

        return redirect()->route('admin.sessions.index')->withFlashSuccess(trans('alerts.backend.sessions.updated'));
    }

    /**
     * Saves the session or repeated sessions and session group details.
     * This function is used for both creating and updating session details.
     *
     * @param mixed $data Request data
     * @param Session $session If this is null or new object, new session will be created. Otherwise updated.
     * @return integer Session ID
     */
    private function save($request, $session = null)
    {
        $input = $request->all();

        if($request->input('repeat', false) && $request->has('repeat_type')) {
            $startTime = $request->has('start_time') ? new Carbon($request->input('start_time')) : null;
            $endTime = $request->has('end_time') ? new Carbon($request->input('end_time')) : $startTime->copy()->addHours(1);
            $repeatType = $request->input('repeat_type');
            $frequency = $request->input('frequency', 1);
            $repeatOn = $request->input('repeat_on', []);
            $repeatBy = $request->input('repeat_by');
            $repeatStartDate = $request->has('start_date') ? new Carbon($request->input('start_date')) : null;
            $repeatEndDate = $request->has('end_date') ? new Carbon($request->input('end_date')) : null;
            $count = $request->input('count', 1);
            $end = $request->input('end', $count >= 1 ? 'after' : 'on');
            $duration = $startTime->diff($endTime);
            $modifier = ['first', 'second', 'third', 'fourth'][$startTime->weekOfMonth - 1];
            $dayOfWeek = $startTime->format('l');
            $input['repeat_on'] = implode(',', $repeatOn);

            // creating the session group
            $sessionGroup = SessionGroup::create($input);

            $data = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'type' => Session::TYPE_BATCH,
                'start_time' => $startTime->toDateTimeString(),
                'end_time' => $endTime->toDateTimeString(),
                'subject_id' => $request->input('subject_id'),
                'room_id' => $request->input('room_id'),
                'location_id' => $request->input('location_id'),
                'teacher_id' => $request->input('teacher_id'),
                'batch_id' => $request->input('batch_id'),
                'status' => $request->input('status'),
                'session_group_id' => $sessionGroup->id,
            ];

            $sessions = [];

            switch ($repeatType) {
                case 'daily': $addOffset = 'addDays'; break;
                case 'weekly': $addOffset = 'addWeeks'; break;
                case 'monthly': $addOffset = 'addMonths'; break;
                case 'yearly': $addOffset = 'addYears'; break;
                default: $addOffset = null; break;
            }

            // count is transformed into repeat end date
            if(($end == 'after' || !$repeatEndDate) && $count > 1) {
                $repeatEndDate = $repeatStartDate->copy()->$addOffset($frequency * $count);
            }

            if($repeatEndDate) {
                while ($startTime->lt($repeatEndDate)) {
                    $sessionData = $data;
                    if($repeatType == 'weekly' && !empty($repeatOn)) {
                        $startOfWeek = $startTime->dayOfWeek != Carbon::SUNDAY ? $startTime->copy()->modify('last sunday') : $startTime->copy();
                        foreach ($repeatOn as $day) {
                            $sessionStartTime = $startOfWeek->copy()->addDays($day);
                            $sessionData['start_time'] = $sessionStartTime->toDateTimeString();
                            $sessionData['end_time'] = $sessionStartTime->add($duration)->toDateTimeString();

                            $sessions[] = $sessionData;
                        }
                    } elseif($repeatType == 'monthly' && $repeatBy == 'dow') {
                        $sessionStartTime = $startTime->copy()->startOfMonth()->subDay()->modify($modifier . ' ' . $dayOfWeek);
                        $sessionData['start_time'] = $sessionStartTime->toDateTimeString();
                        $sessionData['end_time'] = $sessionStartTime->add($duration)->toDateTimeString();

                        $sessions[] = $sessionData;
                    } else {
                        $sessionData['start_time'] = $startTime->toDateTimeString();
                        $sessionData['end_time'] = $startTime->copy()->add($duration)->toDateTimeString();

                        $sessions[] = $sessionData;
                    }

                    $startTime->$addOffset($frequency);
                }
            }

            // dd($sessions);

            DB::connection('tenant')->table('sessions')->insert($sessions);

            return count($sessions);
        } else {
            $session = Session::create($data);
            return 1;
        }
    }
}
