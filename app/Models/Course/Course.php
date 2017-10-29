<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Traits\CourseAttribute;
use App\Models\Traits\UsesTenantConnection;

class Course extends Model
{
    use UsesTenantConnection,
        CourseAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'institute_id', 'status'];
}
