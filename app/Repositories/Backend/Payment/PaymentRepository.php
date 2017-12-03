<?php

namespace App\Repositories\Backend\Payment;

use DB;
use App\Repositories\BaseRepository;
use App\Models\Payment\Payment;

/**
 * Class PaymentRepository
 * @package App\Repositories\Backend\Payment
 */
class PaymentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Payment::class;

    /**
     * @param int  $status
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         *
         */
        $dataTableQuery = $this->query()
            ->with('student')
            ->select('payments.*');
                /*[
                'payments.id',
                'payments.amount',
                'payments.type',
                'payments.installment',
                'payments.month',
                'payments.paid_at',
                'payments.paid_by',
                'payments.paid_to',
                'payments.student_id',
                'payments.batch_id',
                'payments.session_id',
                'payments.payment_method',
                'payments.notes',
                'payments.created_at',
                'payments.updated_at',
                'payments.deleted_at',
            ]*/


        return $dataTableQuery;
    }
}
