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
        return Datatables::of($this->payments->getForDataTable($request->get('status')))
            ->escapeColumns(['name', 'description'])
            ->editColumn('name', function($payment) {
                return link_to_route('admin.payments.show', $payment->name, ['id' => $payment->id]);
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
