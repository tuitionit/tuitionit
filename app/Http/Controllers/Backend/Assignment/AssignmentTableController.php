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
            ->escapeColumns(['location_id', 'room_id', 'course_id', 'batch_id', 'subject_id'])
            ->editColumn('name', function ($assignment) {
                return link_to_route('admin.assignments.show', $assignment->name, [$assignment->id]);
            })
            ->editColumn('type', function ($assignment) {
                return $assignment->typeLabel;
            })
            ->editColumn('start_time', function ($assignment) {
                return $assignment->start_time ? $assignment->start_time : null;
            })
            ->editColumn('end_time', function ($assignment) {
                return $assignment->end_time ? $assignment->end_time : null;
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
