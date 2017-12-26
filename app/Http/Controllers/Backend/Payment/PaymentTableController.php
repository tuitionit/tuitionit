<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Payment\PaymentRepository;
use App\Http\Requests\Backend\Payment\ManagePaymentRequest;

/**
 * Class PaymentTableController.
 */
class PaymentTableController extends Controller
{
    /**
     * @var PaymentRepository
     */
    protected $payments;

    /**
     * @param PaymentRepository $payments
     */
    public function __construct(PaymentRepository $payments)
    {
        $this->payments = $payments;
    }

    /**
     * @param ManagePaymentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePaymentRequest $request)
    {
        return Datatables::eloquent($this->payments->getForDataTable())
            ->escapeColumns(['student_id', 'month', 'notes'])
            ->editColumn('name', function($payment) {
                return link_to_route('admin.payments.show', $payment->student->name, ['id' => $payment->id]);
            })
            ->editColumn('type', function ($payment) {
                return $payment->getTypeLabel();
            })
            ->editColumn('month', function ($payment) {
                return $payment->month ? $payment->month->format('F Y') : null;
            })
            ->editColumn('status', function ($payment) {
                return $payment->status_label;
            })
            ->addColumn('actions', function ($payment) {
                return $payment->action_buttons;
            })
            ->make(true);
    }
}
