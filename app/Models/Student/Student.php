<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Traits\StudentAttribute;

class Student extends Model
{
    use StudentAttribute;

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
