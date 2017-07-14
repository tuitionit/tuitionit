<?php

namespace App\Models\Location\Traits;

use App\Models\Access\User\User;
use App\Models\Institute\Institute;
use App\Models\Room\Room;

/**
 * Class LocationRelationship.
 */
trait LocationRelationship
{
    /**
     * Location can be belong to an institute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
