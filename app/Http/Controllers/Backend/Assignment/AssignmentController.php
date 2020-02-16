<?php

namespace App\Http\Controllers\Backend\Assignment;

use Carbon\Carbon as Carbon;
use App\DataTables\AssignmentsDataTable;
use App\Models\Assignment\Assignment;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Room\Room;
use App\Models\Session\Session;
use App\Models\Student\Student;
use App\Models\Subject\Subject;
use App\Models\Teacher\Teacher;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignment = new Assignment();

        $locations = Location::all()->pluck('name', 'id');
        $rooms = Room::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('name', 'id');
        $courses = Course::all()->pluck('name', 'id');
        $subjects = Subject::all()->pluck('name', 'id');
        $teachers = Teacher::all()->pluck('short_name', 'id');

        return view('backend.assignment.create')->with(compact(
            'assignment',
            'locations',
            'rooms',
            'batches',
            'courses',
            'subjects',
            'teachers'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Assignment\StoreAssignmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentRequest $request, Session $session)
    {
        $data = $request->all();
        // $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date']);
        // $data['end_date'] = Carbon::createFromFormat('d/m/Y', $data['end_date']);
        $assignment = Assignment::create($data);

        return redirect()->route('admin.assignments.index')->withFlashSuccess(trans('alerts.backend.assignments.created'));
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
