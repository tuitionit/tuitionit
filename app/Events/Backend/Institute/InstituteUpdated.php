<?php

namespace App\Events\Backend\Institute;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class InstituteUpdated
 * @package App\Events\Backend\Institute
 */
class InstituteUpdated extends Event
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
