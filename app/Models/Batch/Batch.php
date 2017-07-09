<?php

namespace App\Models\Batch;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch\Traits\BatchAttribute;
use App\Models\Batch\Traits\BatchRelationship;

class Batch extends Model
{
    use BatchAttribute,
        BatchRelationship;

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
    protected $table = 'batches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'location_id',
        'course_id',
        'subject_id',
        'start_date',
        'end_date',
        'status',
    ];
}
