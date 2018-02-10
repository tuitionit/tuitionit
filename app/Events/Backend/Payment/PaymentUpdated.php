<?php

namespace App\Events\Backend\Payment;

use Illuminate\Queue\SerializesModels;

/**
 * Class PaymentUpdated
 * @package App\Events\Backend\Payment
 */
class PaymentUpdated
{
    use SerializesModels;

    /**
     * @var $payment
     */
    public $payment;

    /**
     * @param $payment
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }
}
