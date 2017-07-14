<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher\Traits\TeacherAttribute;
use App\Models\Teacher\Traits\TeacherRelationship;

class Teacher extends Model
{
    use TeacherAttribute,
        TeacherRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'short_name', 'title', 'level', 'cv', 'bio', 'institute_id', 'status'];
}
