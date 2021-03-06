<?php

use Tests\BrowserKitTestCase;

/**
 * Class DashboardRouteTest.
 */
class DashboardRouteTest extends BrowserKitTestCase
{
    public function testAdminDashboard()
    {
        $this->actingAs($this->admin)->visit('/admin/dashboard')->see('Overview')->see($this->admin->name);
    }
}
