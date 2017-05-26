<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
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
        'institute_id'
    ];
}
