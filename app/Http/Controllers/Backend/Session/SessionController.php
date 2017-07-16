<?php

namespace App\Http\Controllers\Backend\Session;

use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Room\Room;
use App\Models\Session\Session;
use App\Models\Teacher\Teacher;
use App\Repositories\Backend\Session\SessionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Session\ManageSessionRequest;
use App\Http\Requests\Backend\Session\StoreSessionRequest;

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
        $locations = [];
        $rooms = [];
        $batches = [];
        $courses = [];
        $subjects = [];
        $teacher = [];

        $user = access()->user();
        if(access()->allow('manage-institutes')) {
            $locations = Location::all();
            $rooms = Room::all();
            $batches = Batch::all();
            $courses = Course::all();
            $subjects = Subject::all();
            $teachers = Teacher::all();
        } else if($user->institute) {
            $locations = $user->institute->locations()->pluck('name', 'id');
            $rooms = $user->institute->rooms()->pluck('rooms.name', 'rooms.id');
            $batches = $user->institute->batches()->pluck('batches.name', 'batches.id');
            $courses = $user->institute->courses()->pluck('name', 'id');
            $subjects = $user->institute->subjects()->pluck('name', 'id');
            $teachers = $user->institute->teachers()->pluck('short_name', 'user_id');
        }

        return view('backend.session.create')->with(compact('session', 'locations', 'rooms', 'batches', 'courses', 'subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Session\StoreSessionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionRequest $request)
    {
        $session = Session::create($request->all());

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
        return view('backend.session.edit')->withSession($session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Session\StoreSessionRequest  $request
     * @param  \App\Models\Session\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSessionRequest $request, Session $session)
    {
        $session->update($request->all());
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
}
