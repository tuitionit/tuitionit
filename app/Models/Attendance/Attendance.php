<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance\Traits\AttendanceAttribute;
use App\Models\Attendance\Traits\AttendanceRelationship;
use App\Models\Traits\UsesTenantConnection;

class Attendance extends Model
{
    use AttendanceAttribute,
        AttendanceRelationship,
        UsesTenantConnection;

    const MARKING_METHOD_MANUAL = 'manual';
    const MARKING_METHOD_MOBILE = 'mobile';
    const MARKING_METHOD_BARCODE = 'barcode';
    const MARKING_METHOD_NFC = 'nfc';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendances';

    /**
     * `created_at` and `updated_at` timestamps are not used with this model
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'in_time',
        'out_time',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'session_id',
        'marking_method',
        'marked_by',
        'in_time',
        'out_time',
        'code',
        'notes',
    ];
}
