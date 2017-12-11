<?php

use Carbon\Carbon;
use App\Models\Batch\Batch;
use App\Models\Student\Student;
use App\Models\Session\Session;

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

    public function testNextSession()
    {
        $student = factory(Student::class)->make([
            'id' => 1
        ]);
        $batch = factory(Batch::class)->make([
            'id' => 1
        ]);
        $student->batches()->attach($batch->id);
        $session = factory(Session::class)->make([
            'id' => 1,
            'batch_id' => $batch->id,
        ]);
        $pastSession = factory(Session::class)->make([
            'id' => 2,
            'batch_id' => $batch->id,
            'start_time' => Carbon::now()->subDays(2),
            'start_time' => Carbon::now()->subDays(2)->addHours(3),
        ]);
        $futureSession = factory(Session::class)->make([
            'id' => 3,
            'batch_id' => $batch->id,
            'start_time' => Carbon::now()->addDays(2),
            'start_time' => Carbon::now()->addDays(2)->addHours(3),
        ]);

        $this->assertEquals($student->nextSession->id, $session->id);
    }
}
