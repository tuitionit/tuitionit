<?php

namespace App\Http\Controllers\Backend\Payment;

use Carbon\Carbon as Carbon;
use App\Models\Payment\Payment;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Session\Session;
use App\Models\Student\Student;
use App\Models\Subject\Subject;
use App\Models\Access\User\User;
use App\Repositories\Backend\Payment\PaymentRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Payment\ManagePaymentRequest;
use App\Http\Requests\Backend\Payment\StorePaymentRequest;

class PaymentController extends Controller
{
    /**
     * @var PaymentRepository
     */
    protected $payments;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(PaymentRepository $payments)
    {
        $this->payments = $payments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManagePaymentRequest $request)
    {
        return view('backend.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment = new Payment();

        $locations = Location::all()->pluck('name', 'id');
        $courses = Course::all()->pluck('name', 'id');
        $subjects = Subject::all()->pluck('name', 'id');
        $student = Student::where('id', request()->old('student_id'))->pluck('name', 'id');
        $session = Session::where('id', request()->old('session_id'))->pluck('name', 'id');
        $payer = User::where('id', request()->old('paid_by'))->pluck('name', 'id');
        $payee = request()->old('paid_to') ? User::where('id', request()->old('paid_to'))->pluck('name', 'id') : [access()->user()->id => access()->user()->name];

        return view('backend.payment.create')->with(compact(
            'student',
            'session',
            'payer',
            'payee',
            'locations',
            'courses',
            'subjects',
            'payment'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Payment\StorePaymentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $data = $request->all();

        $data['month'] = strtotime($data['month']);

        $payment = Payment::create($data);

        return redirect()->route('admin.payments.index')->withFlashSuccess(trans('alerts.backend.payments.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('backend.payment.show')->withPayment($payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('backend.payment.edit')->withPayment($payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Payment\StorePaymentRequest  $request
     * @param  \App\Models\Payment\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(StorePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());
        return redirect()->route('admin.payments.index')->withFlashSuccess(trans('alerts.backend.payments.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Payment $payment
     * @param $status
     * @param ManagePaymentRequest $request
     *
     * @return mixed
     */
    public function mark(Payment $payment, $status, ManagePaymentRequest $request)
    {
        $payment->update(['status' => $status]);

        return redirect()->route('admin.payments.index')->withFlashSuccess(trans('alerts.backend.payments.updated'));
    }
}
