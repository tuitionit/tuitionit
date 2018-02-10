<?php

namespace App\Events\Backend\Attendance;

use Illuminate\Queue\SerializesModels;

/**
 * Class AttendanceDeleted
 * @package App\Events\Backend\Attendance
 */
class AttendanceDeleted
{
    use SerializesModels;

    /**
     * @var $attendance
     */
    public $attendance;

    /**
     * @param $attendance
     */
    public function __construct($attendance)
    {
        $this->attendance = $attendance;
    }
}
