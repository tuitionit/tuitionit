<?php

namespace App\Models\Subject;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject\Traits\SubjectAttribute;
use App\Models\Traits\UsesTenantConnection;

class Subject extends Model
{
    use UsesTenantConnection,
        SubjectAttribute;

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
    protected $fillable = ['name', 'description', 'color', 'institute_id', 'status'];
}
