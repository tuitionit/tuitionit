<?php

namespace App\Events\Backend\Course;

use Illuminate\Queue\SerializesModels;

/**
 * Class CourseDeleted
 * @package App\Events\Backend\Course
 */
class CourseDeleted
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
