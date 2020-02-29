<?php

namespace App\Models\Assignment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Assignment\Traits\AssignmentAttribute;
use App\Models\Assignment\Traits\AssignmentRelationship;
use App\Models\Traits\UsesTenantConnection;

class Assignment extends Model
{
    use UsesTenantConnection,
        AssignmentAttribute,
        AssignmentRelationship;

    const TYPE_EXAM = 'exam';
    const TYPE_LAB = 'lab';
    const TYPE_PROJECT = 'project';
    const TYPE_REPORT = 'report';
    const TYPE_OTHER = 'other';

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_CANCELLED = 2;
    const STATUS_RESCHEDULED = 3;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'type', 'start_time', 'end_time',
        'subject_id', 'room_id', 'location_id', 'teacher_id', 'batch_id', 'course_id',
        'teacher_comment', 'status',
    ];
}
