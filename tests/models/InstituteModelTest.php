<?php

use App\Models\Institute\Institute;

/**
 * Class InstituteModelTest.
 */
class InstituteModelTest extends TestCase
{
    public function testIsActive()
    {
        $institute = factory(Institute::class)->make();
        $this->assertTrue($institute->isActive());
    }
}
