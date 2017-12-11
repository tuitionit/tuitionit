<?php

namespace App\Events\Backend\Institute;

use Illuminate\Queue\SerializesModels;

/**
 * Class InstituteDeleted
 * @package App\Events\Backend\Institute
 */
class InstituteDeleted
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
