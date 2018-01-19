<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Batch\BatchRepository;
use App\Repositories\Backend\Course\CourseRepository;
use App\Repositories\Backend\Payment\PaymentRepository;
use App\Repositories\Backend\Session\SessionRepository;
use App\Repositories\Backend\Student\StudentRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @var BatchRepository
     */
    protected $batches;

    /**
     * @var CourseRepository
     */
    protected $courses;

    /**
     * @var PaymentRepository
     */
    protected $payments;

    /**
     * @var SessionRepository
     */
    protected $sessions;

    /**
     * @var StudentRepository
     */
    protected $students;

    /**
     * @param BatchRepository $batches
     * @param CourseRepository $courses
     * @param PaymentRepository $payments
     * @param SessionRepository $sessions
     * @param StudentRepository $students
     */
    public function __construct(
        BatchRepository $batches,
        CourseRepository $courses,
        PaymentRepository $payments,
        SessionRepository $sessions,
        StudentRepository $students
    )
    {
        $this->batches = $batches;
        $this->courses = $courses;
        $this->payments = $payments;
        $this->sessions = $sessions;
        $this->students = $students;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalCourses = $this->courses->query()->count();
        $totalSessions = $this->sessions->query()->count();
        $totalStudents = $this->students->query()->count();
        $thisMonthSessions = $this->sessions->query()->whereBetween('start_time', [Carbon::now()->startOfMonth(), Carbon::now()])->count();
        $thisMonthStudents = $this->students->query()->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->count();
        $incomeYears = $this->payments->query()
            ->select(DB::raw('YEAR(paid_at) AS year'))
            ->distinct()
            ->orderBy('year')
            ->pluck('year');

        return view('backend.dashboard')->with(compact(
            'totalCourses',
            'totalStudents',
            'totalSessions',
            'thisMonthSessions',
            'thisMonthStudents',
            'incomeYears'
        ));
    }
}
