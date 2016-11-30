<?php

namespace App\Events\Backend\Institute;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class InstituteDeleted
 * @package App\Events\Backend\Institute
 */
class InstituteDeleted extends Event
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
