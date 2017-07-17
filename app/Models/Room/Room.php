<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'has_blackboard',
        'has_whiteboard',
        'has_projector',
        'is_airconditioned',
        'location_id',
        'status'
    ];
}
