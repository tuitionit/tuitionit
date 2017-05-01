<?php

use Tests\BrowserKitTestCase;

/**
 * Class LocationRouteTest.
 */
class LocationRouteTest extends BrowserKitTestCase
{
    public function testAdminLocations()
    {
        $this->actingAs($this->admin)->visit('/admin/locations')->see('Locations')->see($this->admin->name);
    }
}
