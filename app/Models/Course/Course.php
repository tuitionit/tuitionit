<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Traits\CourseAttribute;

class Course extends Model
{
    use CourseAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'color', 'status'];
}
