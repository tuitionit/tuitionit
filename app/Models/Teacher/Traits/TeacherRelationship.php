<?php

namespace App\Models\Teacher\Traits;

use App\Models\Access\User\User;
use App\Models\Batch\Batch;
use App\Models\Location\Location;
use App\Models\Teacher\Teacher;
use App\Models\Subject\Subject;

/**
 * Class TeacherRelationship.
 */
trait TeacherRelationship
{
    /**
     * Teacher can be linked with a user account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_teacher');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher');
    }
}
