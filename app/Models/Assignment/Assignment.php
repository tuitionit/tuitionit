<?php

namespace App\Models\Assignment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Assignment\Traits\AssignmentAttribute;
use App\Models\Traits\UsesTenantConnection;

class Assignment extends Model
{
    use UsesTenantConnection,
        AssignmentAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'institute_id', 'status'];
}
