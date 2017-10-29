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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
