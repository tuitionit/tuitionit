<?php

namespace App\Models\Payment\Traits;

use App\Models\Payment\Payment;
use App\Models\Batch\Batch;
use App\Models\Session\Session;
use App\Models\Student\Student;
use App\Models\Access\User\User;

/**
 * Class PaymentRelationship.
 */
trait PaymentRelationship
{
    /**
     * Payment can be belong to only one Student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Payment can be linked to a batch
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * Payment can be linked to a session
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    /**
     * Payment can be done by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payer()
    {
        return $this->belongsTo(User::class, 'paid_by');
    }

    /**
     * Payment can be accepted by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payee()
    {
        return $this->belongsTo(User::class, 'paid_to');
    }
}
