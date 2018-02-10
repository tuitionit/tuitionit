<?php

namespace App\Http\Controllers\Backend\Course;

use App\DataTables\CoursesDataTable;
use App\Models\Course\Course;
use App\Repositories\Backend\Course\CourseRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Course\ManageCourseRequest;
use App\Http\Requests\Backend\Course\StoreCourseRequest;

class CourseController extends Controller
{
    /**
     * @var CourseRepository
     */
    protected $courses;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(CourseRepository $courses)
    {
        $this->courses = $courses;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageCourseRequest $request, CoursesDataTable $dataTable)
    {
        return $dataTable->render('backend.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Course\StoreCourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->all();

        if (!access()->allow('manage-institutes')) {
            $data['institute_id'] = access()->user()->institute_id;
        }

        $course = Course::create($data);

        return redirect()->route('admin.courses.index')->withFlashSuccess(trans('alerts.backend.courses.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('backend.course.show')->withCourse($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('backend.course.edit')->withCourse($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Course\StoreCourseRequest  $request
     * @param  \App\Models\Course\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        return redirect()->route('admin.courses.index')->withFlashSuccess(trans('alerts.backend.courses.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\Backend\Course\ManageCourseRequest $request
     * @param  \App\Models\Course\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageCourseRequest $request, Course $course)
    {
        $this->courses->delete($course);
        return redirect()->route('admin.courses.index')->withFlashSuccess(trans('alerts.backend.courses.deleted'));
    }

    /**
     * @param Course $course
     * @param $status
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function mark(Course $course, $status, ManageCourseRequest $request)
    {
        $course->update(['status' => $status]);

        return redirect()->route('admin.courses.index')->withFlashSuccess(trans('alerts.backend.courses.updated'));
    }
}
