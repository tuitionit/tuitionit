<?php

namespace App\Events\Backend\Location;

use Illuminate\Queue\SerializesModels;

/**
 * Class LocationUpdated
 * @package App\Events\Backend\Location
 */
class LocationUpdated
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
