<?php

namespace App\Events\Backend\Subject;

use Illuminate\Queue\SerializesModels;

/**
 * Class SubjectUpdated
 * @package App\Events\Backend\Subject
 */
class SubjectUpdated
{
    use SerializesModels;

    /**
     * @var $subject
     */
    public $subject;

    /**
     * @param $subject
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }
}
