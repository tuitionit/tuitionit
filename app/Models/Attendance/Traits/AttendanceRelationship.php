<?php

namespace App\Models\Attendance\Traits;

use App\Models\Access\User\User;
use App\Models\Attendance\Attendance;
use App\Models\Batch\Batch;
use App\Models\Session\Session;
use App\Models\Student\Student;

/**
 * Class AttendanceRelationship.
 */
trait AttendanceRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo(User::class, 'marked_by');
    }
}
