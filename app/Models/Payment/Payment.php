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

    const TYPE_BATCH = 'batch';
    const TYPE_SESSION = 'session';
    const TYPE_INDIVIDUAL = 'individual';
    const TYPE_SEMINAR = 'seminar';
    const TYPE_TEST = 'test';
    const TYPE_OTHER = 'other';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
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
