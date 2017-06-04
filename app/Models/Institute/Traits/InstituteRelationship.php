<?php

namespace App\Models\Institute\Traits;

use App\Models\Access\User\User;
use App\Models\Location\Location;

/**
 * Class InstituteRelationship.
 */
trait InstituteRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
