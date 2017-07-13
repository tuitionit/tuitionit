<?php

namespace App\Models\Student\Traits;

use App\Models\Access\User\User;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Institute\Institute;
use App\Models\Location\Location;
use App\Models\Student\Student;
use App\Models\Subject\Subject;

/**
 * Class StudentRelationship.
 */
trait StudentRelationship
{
    /**
     * Student can be belong to only one Institute.
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
