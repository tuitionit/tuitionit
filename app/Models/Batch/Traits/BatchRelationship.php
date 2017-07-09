<?php

namespace App\Models\Batch\Traits;

use App\Models\Access\User\User;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Subject\Subject;

/**
 * Class BatchRelationship.
 */
trait BatchRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Batch::class, 'batch_student', 'batch_id', 'student_id');
    }
}
