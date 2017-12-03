<?php

namespace App\Models\Session\Traits;

use App\Models\Access\User\User;
use App\Models\Attendance\Attendance;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Student\Student;
use App\Models\Session\Session;
use App\Models\Subject\Subject;
use App\Models\Teacher\Teacher;

/**
 * Class SessionRelationship.
 */
trait SessionRelationship
{
    /**
     * Session can be belong to only one Batch.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
