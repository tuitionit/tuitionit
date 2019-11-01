<?php

namespace App\Http\Controllers\Backend\Assignment;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Assignment\AssignmentRepository;
use App\Http\Requests\Backend\Assignment\ManageAssignmentRequest;

/**
 * Class AssignmentTableController.
 */
class AssignmentTableController extends Controller
{
    /**
     * @var AssignmentRepository
     */
    protected $assignments;

    /**
     * @param AssignmentRepository $assignments
     */
    public function __construct(AssignmentRepository $assignments)
    {
        $this->assignments = $assignments;
    }

    /**
     * @param ManageAssignmentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAssignmentRequest $request)
    {
        return Datatables::eloquent($this->assignments->getForDataTable())
            ->escapeColumns(['student_id', 'month', 'notes'])
            ->editColumn('student', function ($assignment) {
                return link_to_route('admin.students.show', $assignment->student->name, ['id' => $assignment->student_id]);
            })
            ->editColumn('session', function ($assignment) {
                return link_to_route('admin.sessions.show', $assignment->session->name, ['id' => $assignment->session_id]);
            })
            ->editColumn('type', function ($assignment) {
                return $assignment->typeLabel;
            })
            ->editColumn('in_time', function ($assignment) {
                return $assignment->in_time ? $assignment->in_time : null;
            })
            ->editColumn('status', function ($assignment) {
                return $assignment->status_label;
            })
            ->addColumn('actions', function ($assignment) {
                return $assignment->action_buttons;
            })
            ->make(true);
    }
}
