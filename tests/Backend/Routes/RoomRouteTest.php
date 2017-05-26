<?php

use Tests\BrowserKitTestCase;

/**
 * Class RoomRouteTest.
 */
class RoomRouteTest extends BrowserKitTestCase
{
    public function testAdminRooms()
    {
        $this->actingAs($this->admin)->visit('/admin/rooms')->see('Rooms')->see($this->admin->name);
    }
}
