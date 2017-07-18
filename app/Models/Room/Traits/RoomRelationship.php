<?php

namespace App\Models\Room\Traits;

use App\Models\Location\Location;

/**
 * Class RoomRelationship.
 */
trait RoomRelationship
{
    /**
     * Room can be belong to only one Location.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
