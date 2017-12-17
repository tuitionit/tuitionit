<?php

use Tests\BrowserKitTestCase;

/**
 * Class StudentRouteTest.
 */
class StudentRouteTest extends BrowserKitTestCase
{
    public function testAdminStudents()
    {
        $this->actingAs($this->admin)->visit('/admin/students')->see('Students')->see($this->admin->name);
    }
}
