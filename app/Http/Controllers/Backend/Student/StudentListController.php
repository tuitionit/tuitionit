<?php

namespace App\Http\Controllers\Backend\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Student\StudentRepository;

/**
 * Class StudentListController.
 */
class StudentListController extends Controller
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
    public function __invoke(Request $request)
    {
        $studentsQuery = $this->students->searchByName($request->input('name'));

        $students = $studentsQuery->get();

        $list = $students->map(function ($student) {
            return ['id' => $student->id, 'text' => $student->name];
        });

        return $list->all();
    }
}
