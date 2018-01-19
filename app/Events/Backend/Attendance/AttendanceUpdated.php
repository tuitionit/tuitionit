<?php

namespace App\Events\Backend\Attendance;

use Illuminate\Queue\SerializesModels;

/**
 * Class AttendanceUpdated
 * @package App\Events\Backend\Attendance
 */
class AttendanceUpdated
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
