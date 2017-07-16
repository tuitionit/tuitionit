<?php

namespace App\Models\Session\Traits;

use App\Models\Access\User\User;
use App\Models\Course\Course;
use App\Models\Institute\Institute;
use App\Models\Location\Location;
use App\Models\Student\Student;
use App\Models\Session\Session;
use App\Models\Subject\Subject;

/**
 * Class SessionRelationship.
 */
trait SessionRelationship
{
    /**
     * Session can be belong to only one Institute.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function institute()
    {
        return $this->belongsTo(Institute::class);
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
}
