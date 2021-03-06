<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment\Traits\PaymentAttribute;
use App\Models\Payment\Traits\PaymentRelationship;
use App\Models\Traits\UsesTenantConnection;

class Payment extends Model
{
    use PaymentAttribute,
        PaymentRelationship,
        UsesTenantConnection;

    const TYPE_MONTHLY = 'monthly';
    const TYPE_INSTALLMENT = 'installment';
    const TYPE_SESSION = 'session';
    const TYPE_OTHER = 'other';

    const PAYMENT_METHOD_CASH = 'cash';
    const PAYMENT_METHOD_BANK = 'bank';
    const PAYMENT_METHOD_CHEQUE = 'cheque';
    const PAYMENT_METHOD_CREDIT_CARD = 'credit_card';
    const PAYMENT_METHOD_OTHER = 'other';

    const STATUS_PENDING = 0;
    const STATUS_PAID = 1;
    const STATUS_CANCELLED = 2;
    const STATUS_REFUNDED = 3;
    const STATUS_OVERDUE = 4;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'month',
        'paid_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'discount',
        'discount_type',
        'penalty',
        'type',
        'installment',
        'month',
        'paid_at',
        'paid_by',
        'paid_to',
        'student_id',
        'batch_id',
        'session_id',
        'payment_method',
        'notes',
    ];
}
