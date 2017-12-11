<?php

namespace App\Events\Backend\Institute;

use Illuminate\Queue\SerializesModels;

/**
 * Class InstituteUpdated
 * @package App\Events\Backend\Institute
 */
class InstituteUpdated
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
