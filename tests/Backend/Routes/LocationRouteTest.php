<?php

use Tests\BrowserKitTestCase;

/**
 * Class LocationRouteTest.
 */
class LocationRouteTest extends BrowserKitTestCase
{
    public function testCreateLocation()
    {
        $this->actingAs($this->executive)
            ->visit('/admin/institute/1/locations/create')
            ->see('Tuitionix')
            ->see('Add New Location')
            ->see($this->executive->name);
    }
}
