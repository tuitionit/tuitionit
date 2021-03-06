<?php

use Tests\BrowserKitTestCase;

/**
 * Class InstituteRouteTest.
 */
class InstituteRouteTest extends BrowserKitTestCase
{
    public function testAdminInstitutes()
    {
        $this->actingAs($this->admin)->visit('/admin/institutes')->see('Institutes')->see($this->admin->name);
    }

    public function testAdminInstitute()
    {
        $this->actingAs($this->executive)->visit('/admin/institute')->see('Locations')->see($this->executive->name);
    }

    public function testCreateInstitute()
    {
        $this->actingAs($this->admin)->visit('/admin/institutes/create')->see('New Institute');
    }
}
