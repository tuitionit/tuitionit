<?php

namespace App\Events\Backend\Batch;

use Illuminate\Queue\SerializesModels;

/**
 * Class BatchUpdated
 * @package App\Events\Backend\Batch
 */
class BatchUpdated
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
