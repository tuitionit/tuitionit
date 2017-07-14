<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Student\StudentRepository;
use App\Http\Requests\Backend\Student\ManageStudentRequest;

/**
 * Class StudentTableController.
 */
class StudentTableController extends Controller
{
    /**
     * @var StudentRepository
     */
    protected $students;

    /**
     * @param StudentRepository $students
     */
    public function __construct(StudentRepository $students)
    {
        $this->students = $students;
    }

    /**
     * @param ManageStudentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageStudentRequest $request)
    {
        return Datatables::of($this->students->getForDataTable($request->get('status')))
            ->escapeColumns(['email'])
            ->editColumn('name', function($student) {
                return link_to_route('admin.students.show', $student->name, ['id' => $student->id]);
            })
            ->editColumn('status', function ($student) {
                return $student->status_label;
            })
            ->addColumn('actions', function ($student) {
                return $student->action_buttons;
            })
            ->make(true);
    }
}
