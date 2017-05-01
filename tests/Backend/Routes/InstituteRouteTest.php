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
        $this->actingAs($this->executive)->visit('/admin/institute')->see('Institute Details')->see($this->executive->name);
    }
}
