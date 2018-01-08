<?php

namespace App\Events\Backend\Payment;

use Illuminate\Queue\SerializesModels;

/**
 * Class PaymentCreated
 * @package App\Events\Backend\Payment
 */
class PaymentCreated
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
