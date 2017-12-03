<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher\Traits\TeacherAttribute;
use App\Models\Teacher\Traits\TeacherRelationship;
use App\Models\Traits\UsesTenantConnection;

class Teacher extends Model
{
    use UsesTenantConnection,
        TeacherAttribute,
        TeacherRelationship;

    const TITLE_MR = 'mr';
    const TITLE_MRS = 'mrs';
    const TITLE_MS = 'ms';
    const TITLE_MX = 'mx';
    const TITLE_DR = 'dr';
    const TITLE_PROF = 'prof';
    const TITLE_REV = 'rev';

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
    protected $fillable = [
        'name',
        'short_name',
        'title',
        'level',
        'cv',
        'bio',
        'user_id',
        'institute_id',
        'status'
    ];
}
