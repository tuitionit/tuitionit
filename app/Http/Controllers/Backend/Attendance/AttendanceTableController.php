<?php

namespace App\Http\Controllers\Backend\Attendance;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Attendance\AttendanceRepository;
use App\Http\Requests\Backend\Attendance\ManageAttendanceRequest;

/**
 * Class AttendanceTableController.
 */
class AttendanceTableController extends Controller
{
    /**
     * @var AttendanceRepository
     */
    protected $attendances;

    /**
     * @param AttendanceRepository $attendances
     */
    public function __construct(AttendanceRepository $attendances)
    {
        $this->payments = $attendances;
    }

    /**
     * @param ManageAttendanceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAttendanceRequest $request)
    {
        return Datatables::eloquent($this->payments->getForDataTable())
            ->escapeColumns(['student_id', 'month', 'notes'])
            ->editColumn('student', function ($attendance) {
                return link_to_route('admin.students.show', $attendance->student->name, ['id' => $attendance->student_id]);
            })
            ->editColumn('session', function ($attendance) {
                return link_to_route('admin.sessions.show', $attendance->session->name, ['id' => $attendance->session_id]);
            })
            ->editColumn('type', function ($attendance) {
                return $attendance->typeLabel;
            })
            ->editColumn('in_time', function ($attendance) {
                return $attendance->in_time ? $attendance->in_time : null;
            })
            ->editColumn('status', function ($attendance) {
                return $attendance->status_label;
            })
            ->addColumn('actions', function ($attendance) {
                return $attendance->action_buttons;
            })
            ->make(true);
    }
}
