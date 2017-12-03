<?php

namespace App\Events\Backend\Batch;

use Illuminate\Queue\SerializesModels;

/**
 * Class BatchCreated
 * @package App\Events\Backend\Batch
 */
class BatchCreated
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
