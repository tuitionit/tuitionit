<?php

use Tests\BrowserKitTestCase;

/**
 * Class TeacherRouteTest.
 */
class TeacherRouteTest extends BrowserKitTestCase
{
    public function testAdminRooms()
    {
        $this->actingAs($this->admin)->visit('/admin/rooms')->see('Rooms')->see($this->admin->name);
    }
}
