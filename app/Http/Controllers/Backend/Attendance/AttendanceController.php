<?php

namespace App\Http\Controllers\Backend\Attendance;

use Carbon\Carbon as Carbon;
use App\DataTables\AttendancesDataTable;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Attendance\Attendance;
use App\Models\Session\Session;
use App\Models\Student\Student;
use App\Models\Subject\Subject;
use App\Models\Access\User\User;
use App\Repositories\Backend\Attendance\AttendanceRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Attendance\ManageAttendanceRequest;
use App\Http\Requests\Backend\Attendance\StoreAttendanceRequest;

class AttendanceController extends Controller
{
    /**
     * @var AttendanceRepository
     */
    protected $attendances;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(AttendanceRepository $attendances)
    {
        $this->attendances = $attendances;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageAttendanceRequest $request, AttendancesDataTable $dataTable)
    {
        return $dataTable->render('backend.attendance.index');
    }

    /**
     * Show the form for marking the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark()
    {
        $attendance = new Attendance();
        $session = Session::find(request()->get('session', 0));
        $sessionsOfDay = ($session && $session->exists) ? null : Session::with(['batch', 'teacher'])
            ->whereBetween('start_time', [Carbon::now()->startOfday()->toDateTimeString(), Carbon::now()->endOfday()->toDateTimeString()])
            // ->pluck('name', 'id');
            ->get();

        $sessions = empty($sessionsOfDay) ? [] : $sessionsOfDay->map(function ($session) {
            return [
                'id' => $session->id,
                'text' => $session->name,
                'batch' => $session->batch->name,
                'time' => trans('strings.backend.sessions.time_from_to', ['start' => $session->start_time->format('h:i A'), 'end' => $session->end_time->format('h:i A')]),
            ];
        });

        return view('backend.attendance.mark')->with(compact('attendance', 'session', 'sessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Attendance\StoreAttendanceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request, Session $session)
    {
        $student = Student::find($request->get('id'));
        $output = [
            'student' => $student,
            'type' => 'error',
            'message' => '',
            'count' => $session->attendance,
        ];

        if ($student) {
            if ($session->batch->hasStudent($student->id)) {
                if (!$attendance = Attendance::where([
                    ['student_id', '=', $student->id],
                    ['session_id', '=', $session->id],
                ])->first()) {
                    $attendance = Attendance::create([
                        'student_id' => $student->id,
                        'session_id' => $session->id,
                        'marking_method' => Attendance::MARKING_METHOD_MANUAL,
                        'marked_by' => access()->user()->id,
                        'in_time' => Carbon::now(),
                    ]);
                }

                if ($attendance) {
                    $output['type'] = 'success';
                    $output['message'] = trans('strings.backend.attendances.success');
                    $output['count'] = $session->attendance;
                }
            } else {
                $output['message'] = trans('strings.backend.attendances.student_not_in_batch');
            }
        } else {
            $output['message'] = trans('strings.backend.attendances.student_not_found');
        }

        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        return view('backend.attendance.show')->withAttendance($attendance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        $batch = request()->old('batch_id') ? Batch::where('id', request()->old('batch_id'))->pluck('name', 'id') : $attendance->batch()->pluck('name', 'id');
        $session = request()->old('session_id') ? Session::where('id', request()->old('session_id'))->pluck('name', 'id') : $attendance->session()->pluck('name', 'id');
        $student = request()->old('student_id') ? Student::where('id', request()->old('student_id'))->pluck('name', 'id') : $attendance->student()->pluck('name', 'id');
        $payer = request()->old('paid_by') ? User::where('id', request()->old('paid_by'))->pluck('name', 'id') : $attendance->payer()->pluck('name', 'id');
        $payee = request()->old('paid_to') ? User::where('id', request()->old('paid_to'))->pluck('name', 'id') : $attendance->payee()->pluck('name', 'id');

        return view('backend.attendance.edit')->with(compact('attendance', 'batch', 'session', 'student', 'payer', 'payee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Attendance\StoreAttendanceRequest  $request
     * @param  \App\Models\Attendance\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAttendanceRequest $request, Attendance $attendance)
    {
        $data = $request->all();

        $data['month'] = strtotime($data['month']);

        $attendance->update($data);

        return redirect()->route('admin.attendances.index')->withFlashSuccess(trans('alerts.backend.attendances.updated'));
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
}
