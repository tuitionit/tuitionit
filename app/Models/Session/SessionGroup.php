<?php

namespace App\Models\Session;

use Illuminate\Database\Eloquent\Model;
use App\Models\Session\Traits\SessionGroupAttribute;
use App\Models\Session\Traits\SessionRelationship;
use App\Models\Traits\UsesTenantConnection;

/**
 * Class SessionGroup
 * package App.
 */
class SessionGroup extends Model
{
    use UsesTenantConnection,
        SessionGroupAttribute;

    const REPEAT_TYPE_DAILY = 'daily';
    const REPEAT_TYPE_WEEKLY = 'weekly';
    const REPEAT_TYPE_MONTHLY = 'monthly';
    const REPEAT_TYPE_YEARLY = 'yearly';

    const REPEAT_BY_DAY_OF_MONTH = 'day-of-month';
    const REPEAT_BY_DAY_OF_WEEK = 'day-of-week';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'session_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'repeat_type',
        'frequency',
        'repeat_on',
        'repeat_by',
        'count',
        'created_at',
        'updated_at',
    ];
}
