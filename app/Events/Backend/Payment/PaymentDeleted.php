<?php

namespace App\Events\Backend\Payment;

use Illuminate\Queue\SerializesModels;

/**
 * Class PaymentDeleted
 * @package App\Events\Backend\Payment
 */
class PaymentDeleted
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
