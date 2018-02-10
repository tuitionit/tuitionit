<?php

namespace App\Events\Backend\Location;

use Illuminate\Queue\SerializesModels;

/**
 * Class LocationDeleted
 * @package App\Events\Backend\Location
 */
class LocationDeleted
{
    use SerializesModels;

    /**
     * @var $location
     */
    public $location;

    /**
     * @param $location
     */
    public function __construct($location)
    {
        $this->location = $location;
    }
}
