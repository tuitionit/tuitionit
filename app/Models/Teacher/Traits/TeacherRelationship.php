<?php

namespace App\Models\Teacher\Traits;

use App\Models\Access\User\User;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Institute\Institute;
use App\Models\Location\Location;
use App\Models\Teacher\Teacher;
use App\Models\Subject\Subject;

/**
 * Class TeacherRelationship.
 */
trait TeacherRelationship
{
    /**
     * Teacher can be belong to only one Institute.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }
}
