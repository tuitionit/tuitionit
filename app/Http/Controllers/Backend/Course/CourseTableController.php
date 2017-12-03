<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Course\CourseRepository;
use App\Http\Requests\Backend\Course\ManageCourseRequest;

/**
 * Class CourseTableController.
 */
class CourseTableController extends Controller
{
    /**
     * @var CourseRepository
     */
    protected $courses;

    /**
     * @param CourseRepository $courses
     */
    public function __construct(CourseRepository $courses)
    {
        $this->courses = $courses;
    }

    /**
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCourseRequest $request)
    {
        return Datatables::of($this->courses->getForDataTable($request->get('status')))
            ->escapeColumns(['name', 'description'])
            ->editColumn('name', function($course) {
                return link_to_route('admin.courses.edit', $course->name, ['id' => $course->id]);
            })
            ->editColumn('status', function ($user) {
                return $user->status_label;
            })
            ->addColumn('actions', function ($batch) {
                return $batch->action_buttons;
            })
            ->make(true);
    }
}
