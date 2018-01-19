<?php

namespace App\Events\Backend\Attendance;

use Illuminate\Queue\SerializesModels;

/**
 * Class StudentAttended
 * @package App\Events\Backend\Attendance
 */
class StudentAttended
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
