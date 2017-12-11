<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room\Traits\RoomRelationship;
use App\Models\Traits\UsesTenantConnection;

class Room extends Model
{
    use UsesTenantConnection,
        RoomRelationship;

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
        'has_sound',
        'has_blackboard',
        'has_whiteboard',
        'has_projector',
        'is_airconditioned',
        'location_id',
        'status'
    ];
}
