<?php

namespace App\Models\Session;

use Illuminate\Database\Eloquent\Model;
use App\Models\Session\Traits\SessionAttribute;
use App\Models\Session\Traits\SessionRelationship;
use App\Models\Traits\UsesTenantConnection;

/**
 * Class Session
 * package App.
 */
class Session extends Model
{
    use UsesTenantConnection,
        SessionAttribute,
        SessionRelationship;

    const TYPE_STANDARD = 'standard';
    const TYPE_GROUP = 'group';
    const TYPE_INDIVIDUAL = 'individual';
    const TYPE_SEMINAR = 'seminar';
    const TYPE_TEST = 'test';
    const TYPE_OTHER = 'other';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'start_time',
        'end_time',
        'subject_id',
        'room_id',
        'location_id',
        'teacher_id',
        'batch_id',
        'course_id',
        'is_template',
        'teacher_comment',
        'original_id',
        'status'
    ];
}
