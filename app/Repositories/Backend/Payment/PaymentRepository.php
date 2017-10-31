<?php

namespace App\Repositories\Backend\Payment;

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
    public function getForDataTable($status = 1)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select([
                'payments.id',
                'payments.name',
                'payments.description',
                'payments.status',
                'payments.created_at',
                'payments.updated_at',
                'payments.deleted_at',
            ]);

        return $dataTableQuery;
    }
}
