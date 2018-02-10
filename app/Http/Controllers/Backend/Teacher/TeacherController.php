<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\DataTables\TeachersDataTable;
use App\Models\Teacher\Teacher;
use App\Models\Access\User\User;
use App\Repositories\Backend\Teacher\TeacherRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Teacher\ManageTeacherRequest;
use App\Http\Requests\Backend\Teacher\StoreTeacherRequest;

class TeacherController extends Controller
{
    /**
     * @var TeacherRepository
     */
    protected $teachers;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(TeacherRepository $teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageTeacherRequest $request, TeachersDataTable $dataTable)
    {
        return $dataTable->render('backend.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new Teacher();
        return view('backend.teacher.create')->withTeacher($teacher);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Teacher\StoreTeacherRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        $data = $request->all();

        if (!access()->allow('manage-institutes')) {
            $data['institute_id'] = access()->user()->institute_id;
        }

        $teacher = Teacher::create($data);

        if ($teacher && $request->has('subjects')) {
            $teacher->subjects()->attach($request->input('subjects'));
        }

        return redirect()->route('admin.teachers.index')->withFlashSuccess(trans('alerts.backend.teachers.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('backend.teacher.show')->withTeacher($teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $user = request()->old('user_id') ? User::where('id', request()->old('user_id'))->pluck('name', 'id') : $teacher->user()->pluck('name', 'id');
        return view('backend.teacher.edit')->with(compact('teacher', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Teacher\StoreTeacherRequest  $request
     * @param  \App\Models\Teacher\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return redirect()->route('admin.teachers.index')->withFlashSuccess(trans('alerts.backend.teachers.updated'));
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
     * @param Teacher $teacher
     * @param $status
     * @param ManageTeacherRequest $request
     *
     * @return mixed
     */
    public function mark(Teacher $teacher, $status, ManageTeacherRequest $request)
    {
        $teacher->update(['status' => $status]);

        return redirect()->route('admin.teachers.index')->withFlashSuccess(trans('alerts.backend.teachers.updated'));
    }
}
