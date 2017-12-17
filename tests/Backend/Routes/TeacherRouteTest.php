<?php

use Tests\BrowserKitTestCase;

/**
 * Class TeacherRouteTest.
 */
class TeacherRouteTest extends BrowserKitTestCase
{
    public function testAdminRooms()
    {
        $this->actingAs($this->admin)->visit('/admin/teachers')->see('Teachers')->see($this->admin->name);
    }
}
