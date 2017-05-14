<?php

use App\Models\Student\Student;

/**
 * Class StudentModelTest.
 */
class StudentModelTest extends TestCase
{
    public function testIsActive()
    {
        $student = factory(Student::class)->make();
        $this->assertTrue($student->isActive());
    }
}
