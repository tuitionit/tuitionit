<?php

namespace App\Events\Backend\Assignment;

use Illuminate\Queue\SerializesModels;

/**
 * Class AssignmentCreated
 * @package App\Events\Backend\Assignment
 */
class AssignmentCreated
{
    use SerializesModels;

    /**
     * @var $assignment
     */
    public $assignment;

    /**
     * @param $assignment
     */
    public function __construct($assignment)
    {
        $this->assignment = $assignment;
    }
}
