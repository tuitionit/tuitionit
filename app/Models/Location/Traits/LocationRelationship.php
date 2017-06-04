<?php

namespace App\Models\Location\Traits;

use App\Models\Access\User\User;
use App\Models\Institute\Institute;

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
}
