<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Attendance\AttendanceRepository;
use App\Repositories\Backend\Payment\PaymentRepository;
use App\Repositories\Backend\Session\SessionRepository;
use App\Repositories\Backend\Student\StudentRepository;

/**
 * Class ChartController.
 */
class ChartController extends Controller
{
    /**
     * Returns the datasets and labels required to generate the chart of students attendance against the number of
     * student sessions over year.
     *
     * @param  \Illuminate\Http\Request $request;
     * @param  \App\Repositories\Backend\Payment\PaymentRepository $payments;
     * @return mixed
     */
    public function incomeOverYear(Request $request, PaymentRepository $payments)
    {
        list($data, $output) = $this->getYearlyOutput($request);

        $earnings = $payments->monthlyEarningsOfYear($data['year']);

        if (!empty($earnings)) {
            $dataset = array_fill(1, 12, 0.00);
            foreach ($earnings as $earning) {
                $dataset[$earning->paid_month] = floatval($earning->amount);
            }
                $output['datasets'][] = $dataset;
        }

        return $output;
    }

    /**
     * Returns the datasets and labels required to generate the chart of students attendance against the number of
     * student sessions over year.
     *
     * @param  \Illuminate\Http\Request $request;
     * @param  \App\Repositories\Backend\Student\StudentRepository $students;
     * @param  \App\Repositories\Backend\Session\SessionRepository $sessions;
     * @param  \App\Repositories\Backend\Attendance\AttendanceRepository $attendance;
     * @return mixed
     */
    public function studentAttendance(
        Request $request,
        StudentRepository $students,
        SessionRepository $sessions,
        AttendanceRepository $attendance
    ) {
        list($data, $output) = $this->getYearlyOutput($request);

        $monthlyStudents = $students->query()
            ->select(
                DB::raw('COUNT(`id`) as total'),
                DB::raw((DB::connection()->getDriverName() == 'sqlite'
                    ? 'strftime("%m", `created_at`)'
                    : 'MONTH(`created_at`)') . ' AS `month`')
            )
            ->whereBetween('created_at', [$data['year'] . '-01-01 00:00:00', $data['year'] . '-12-31 23:59:59'])
            ->groupBy('month')
            ->get();

        $studentSessions = $sessions->query()//DB::table('sessions')
            ->select(
                DB::raw('COUNT(`batch_student`.`student_id`) as total'),
                DB::raw((DB::connection()->getDriverName() == 'sqlite'
                    ? 'strftime("%m", `sessions`.`start_time`)'
                    : 'MONTH(`sessions`.`start_time`)') . ' AS `month`')
            )
            ->join('batch_student', 'sessions.batch_id', '=', 'batch_student.batch_id')
            ->whereBetween(
                'sessions.start_time',
                [$data['year'] . '-01-01 00:00:00', $data['year'] . '-12-31 23:59:59']
            )
            ->groupBy('month')
            ->get();

        $attendances = $attendance->query()
            ->select(
                DB::raw('COUNT(`id`) as total'),
                DB::raw((DB::connection()->getDriverName() == 'sqlite'
                    ? 'strftime("%m", `in_time`)'
                    : 'MONTH(`in_time`)') . ' AS `month`')
            )
            ->whereBetween('in_time', [$data['year'] . '-01-01 00:00:00', $data['year'] . '-12-31 23:59:59'])
            ->groupBy('month')
            ->get();

        /*if(!empty($monthlyStudents)) {
            $dataset = array_fill(1, 12, 0.00);
            foreach ($monthlyStudents as $student) {
                $dataset[$student->month] = floatval($student->total);
            }
            $output['datasets'][] = $dataset;
        }*/

        if (!empty($studentSessions)) {
            $dataset = array_fill(1, 12, 0.00);
            foreach ($studentSessions as $studentSession) {
                $dataset[$studentSession->month] = floatval($studentSession->total);
            }
            $output['datasets'][] = $dataset;
        }

        if (!empty($attendances)) {
            $dataset = array_fill(1, 12, 0.00);
            foreach ($attendances as $attendance) {
                $dataset[$attendance->month] = floatval($attendance->total);
            }
            $output['datasets'][] = $dataset;
        }

        return $output;
    }

    /**
     * Returns the pre-processed request data and output data to be used for further processing
     *
     * @param \Illuminate\Http\Request $request
     * @return $mixed [$data, $output]
     */
    private function getYearlyOutput(Request $request)
    {
        $this->validate($request, [
            'year' => 'sometimes|required|digits:4|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        $data = $request->all();

        if (empty($data['year'])) {
            $data['year'] = date('Y');
        }

        $output = [
            'year' => $data['year'],
            'labels' => [
                trans('labels.general.months.january'),
                trans('labels.general.months.february'),
                trans('labels.general.months.march'),
                trans('labels.general.months.april'),
                trans('labels.general.months.may'),
                trans('labels.general.months.june'),
                trans('labels.general.months.july'),
                trans('labels.general.months.august'),
                trans('labels.general.months.september'),
                trans('labels.general.months.october'),
                trans('labels.general.months.november'),
                trans('labels.general.months.december'),
            ],
            'datasets' => [],
        ];

        return [$data, $output];
    }
}
