<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Teacher\TeacherRepository;
use App\Http\Requests\Backend\Teacher\ManageTeacherRequest;

/**
 * Class TeacherTableController.
 */
class TeacherTableController extends Controller
{
    /**
     * @var TeacherRepository
     */
    protected $teachers;

    /**
     * @param TeacherRepository $teachers
     */
    public function __construct(TeacherRepository $teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * @param ManageTeacherRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTeacherRequest $request)
    {
        return Datatables::of($this->teachers->getForDataTable($request->get('status')))
            ->escapeColumns(['name', 'email'])
            ->addColumn('actions', function ($teacher) {
                return $teacher->action_buttons;
            })
            ->make(true);
    }
}
