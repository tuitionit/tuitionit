<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Traits\StudentAttribute;
use App\Models\Student\Traits\StudentRelationship;
use App\Models\Traits\UsesTenantConnection;

class Student extends Model
{
    use UsesTenantConnection,
        StudentAttribute,
        StudentRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['index_number', 'name', 'phone', 'institute_id', 'status'];
}
