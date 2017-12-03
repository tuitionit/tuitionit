<?php

namespace App\Http\Controllers\Backend\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Attendance\AttendanceRepository;

/**
 * Class AttendanceListController.
 */
class AttendanceListController extends Controller
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
        $this->attendances = $attendances;
    }

    /**
     * @param ManageAttendanceRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $attendancesQuery = $this->attendances->searchByName($request->input('name'));

        $attendances = $attendancesQuery->get();

        $list = $attendances->map(function($batch) {
            return ['id' => $batch->id, 'text' => $batch->name];
        });

        return $list->all();
    }
}
