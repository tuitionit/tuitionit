<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Traits\LocationAttribute;
use App\Models\Location\Traits\LocationRelationship;
use App\Models\Traits\UsesTenantConnection;

class Location extends Model
{
    use UsesTenantConnection,
    LocationAttribute,
    LocationRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'address',
        'city',
        'state_province',
        'country',
        'postal_code',
        'email',
        'fax',
        'phone',
        'web',
        'status',
    ];
}
