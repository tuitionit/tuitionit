<?php

namespace App\Events\Backend\Institute;

use Illuminate\Queue\SerializesModels;

/**
 * Class InstituteCreated
 * @package App\Events\Backend\Institute
 */
class InstituteCreated
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
