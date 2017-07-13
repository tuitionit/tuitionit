<?php

namespace App\Http\Controllers\Backend\Student;

use Illuminate\Http\Request;
use App\Models\Student\Student;
use App\Repositories\Backend\Student\StudentRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Student\ManageStudentRequest;
use App\Http\Requests\Backend\Student\StoreStudentRequest;

class StudentController extends Controller
{
    /**
     * @var StudentRepository
     */
    protected $students;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(StudentRepository $students)
    {
        $this->students = $students;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageStudentRequest $request)
    {
        return view('backend.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $batchId = $request->has('batch') ? $request->input('batch') : null;
        return view('backend.student.create')->withBatch($batchId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Student\StoreStudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        if(!access()->allow('manage-institutes')) {
            $data['institute_id'] = access()->user()->institute_id;
        }

        $student = Student::create($data);

        if($request->has('batch_id')) {
            $student->fresh()->batches()->syncWithoutDetaching([$request->input('batch_id')]);
            return redirect()->route('admin.batches.show', ['id' => $request->input('batch_id')])->withFlashSuccess(trans('alerts.backend.students.created'));
        }

        return redirect()->route('admin.students.index')->withFlashSuccess(trans('alerts.backend.students.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('backend.student.show')->withStudent($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('backend.student.edit')->withStudent($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Student\StoreStudentRequest  $request
     * @param  \App\Models\Student\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;
        $student->update($data);
        return redirect()->route('admin.students.index')->withFlashSuccess(trans('alerts.backend.students.updated'));
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
     * @param Student $student
     * @param $status
     * @param ManageStudentRequest $request
     *
     * @return mixed
     */
    public function mark(Student $student, $status, ManageStudentRequest $request)
    {
        $student->update(['status' => $status]);

        return redirect()->route('admin.students.index')->withFlashSuccess(trans('alerts.backend.students.updated'));
    }
}
