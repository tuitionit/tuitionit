<?php

namespace App\Http\Controllers\Backend\Student;

use Illuminate\Http\Request;
use App\Models\Location\Location;
use App\Models\Student\Student;
use App\Models\Access\User\User;
use App\Repositories\Backend\Student\StudentRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Student\ManageStudentRequest;
use App\Http\Requests\Backend\Student\StoreStudentRequest;
use App\Http\Requests\Backend\Student\UpdateStudentRequest;

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
        $user = User::where('id', request()->old('user_id'))->pluck('name', 'id');
        $parent = User::where('id', request()->old('parent_id'))->pluck('name', 'id');
        $locations = Location::all()->pluck('name', 'id');
        return view('backend.student.create')->with(compact('batchId', 'user', 'parent', 'locations'));
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

        $student = Student::create($data);
        $student = $student->fresh();

        // add locations
        $locations = $request->get('locations', []);
        if(!empty($locations)) {
            $student->locations()->sync($locations);
        }

        if($request->has('batch_id')) {
            $student->batches()->syncWithoutDetaching([$request->input('batch_id')]);
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
        $user = $student->user ? [[$student->user->id => $student->user->name]] : [];
        $parent = $student->parent ? [[$student->parent->id => $student->parent->name]] : [];

        if(request()->old('user_id')) {
            $user = User::where('id', request()->old('user_id'))->pluck('name', 'id');
        }

        if(request()->old('parent_id')) {
            $parent = User::where('id', request()->old('parent_id'))->pluck('name', 'id');
        }

        $locations = Location::all()->pluck('name', 'id');
        return view('backend.student.edit')->with(compact('student', 'user', 'parent', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Student\UpdateStudentRequest  $request
     * @param  \App\Models\Student\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;
        $student->update($data);

        // add / remove locations
        $locations = $request->get('locations', []);
        if(!empty($locations)) {
            $student->locations()->sync($locations);
        }

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
