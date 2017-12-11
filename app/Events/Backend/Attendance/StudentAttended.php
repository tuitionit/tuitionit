<?php

namespace App\Events\Backend\Attendance;

use Illuminate\Queue\SerializesModels;

/**
 * Class AttendanceAttended
 * @package App\Events\Backend\Attendance
 */
class AttendanceAttended
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
