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
     * @var $institute
     */
    public $institute;

    /**
     * @param $institute
     */
    public function __construct($institute)
    {
        $this->institute = $institute;
    }
}
