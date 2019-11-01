<?php

namespace App\Http\Controllers\Backend\Assignment;

use Carbon\Carbon as Carbon;
use App\DataTables\AssignmentsDataTable;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Assignment\Assignment;
use App\Models\Session\Session;
use App\Models\Student\Student;
use App\Models\Subject\Subject;
use App\Models\Access\User\User;
use App\Repositories\Backend\Assignment\AssignmentRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Assignment\ManageAssignmentRequest;
use App\Http\Requests\Backend\Assignment\StoreAssignmentRequest;

class AssignmentController extends Controller
{
    /**
     * @var AssignmentRepository
     */
    protected $assignments;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(AssignmentRepository $assignments)
    {
        $this->assignments = $assignments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageAssignmentRequest $request, AssignmentsDataTable $dataTable)
    {
        return $dataTable->render('backend.assignment.index');
    }

    /**
     * Show the form for marking the assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark()
    {
        $assignment = new Assignment();
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

        return view('backend.assignment.mark')->with(compact('assignment', 'session', 'sessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Assignment\StoreAssignmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentRequest $request, Session $session)
    {
        $student = Student::find($request->get('id'));
        $output = [
            'student' => $student,
            'type' => 'error',
            'message' => '',
            'count' => $session->assignment,
        ];

        if ($student) {
            if ($session->batch->hasStudent($student->id)) {
                if (!$assignment = Assignment::where([
                    ['student_id', '=', $student->id],
                    ['session_id', '=', $session->id],
                ])->first()) {
                    $assignment = Assignment::create([
                        'student_id' => $student->id,
                        'session_id' => $session->id,
                        'marking_method' => Assignment::MARKING_METHOD_MANUAL,
                        'marked_by' => access()->user()->id,
                        'in_time' => Carbon::now(),
                    ]);
                }

                if ($assignment) {
                    $output['type'] = 'success';
                    $output['message'] = trans('strings.backend.assignments.success');
                    $output['count'] = $session->assignment;
                }
            } else {
                $output['message'] = trans('strings.backend.assignments.student_not_in_batch');
            }
        } else {
            $output['message'] = trans('strings.backend.assignments.student_not_found');
        }

        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        return view('backend.assignment.show')->withAssignment($assignment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $batch = request()->old('batch_id') ? Batch::where('id', request()->old('batch_id'))->pluck('name', 'id') : $assignment->batch()->pluck('name', 'id');
        $session = request()->old('session_id') ? Session::where('id', request()->old('session_id'))->pluck('name', 'id') : $assignment->session()->pluck('name', 'id');
        $student = request()->old('student_id') ? Student::where('id', request()->old('student_id'))->pluck('name', 'id') : $assignment->student()->pluck('name', 'id');
        $payer = request()->old('paid_by') ? User::where('id', request()->old('paid_by'))->pluck('name', 'id') : $assignment->payer()->pluck('name', 'id');
        $payee = request()->old('paid_to') ? User::where('id', request()->old('paid_to'))->pluck('name', 'id') : $assignment->payee()->pluck('name', 'id');

        return view('backend.assignment.edit')->with(compact('assignment', 'batch', 'session', 'student', 'payer', 'payee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Assignment\StoreAssignmentRequest  $request
     * @param  \App\Models\Assignment\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAssignmentRequest $request, Assignment $assignment)
    {
        $data = $request->all();

        $data['month'] = strtotime($data['month']);

        $assignment->update($data);

        return redirect()->route('admin.assignments.index')->withFlashSuccess(trans('alerts.backend.assignments.updated'));
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
