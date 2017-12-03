<?php

namespace App\Models\Student\Traits;

use App\Models\Batch\Batch;
use App\Models\Location\Location;
use App\Models\Student\Student;
use App\Models\Access\User\User;

/**
 * Class StudentRelationship.
 */
trait StudentRelationship
{
    /**
     * Student can be linked with a User account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Student can be linked with a User as parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_student');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'batch_student');
    }
}
