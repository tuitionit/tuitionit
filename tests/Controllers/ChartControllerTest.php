<?php

use App\Models\Payment\Payment;

/**
 * Class ChartControllerTest
 */
class ChartControllerTest extends TestCase
{
    /**
     * Tests output json of /admin/charts/income-over-year is valid
     */
    public function testIncomeOverYear()
    {
        $payment = factory(Payment::class)->create();

        $response = $this->actingAs($this->admin)->json('GET', '/admin/charts/income-over-year');

        $response->assertStatus(200)
            ->assertJson([
                'year' => date('Y'),
            ])
            ->assertJsonFragment([
                strval($payment->paid_at->month) => $payment->amount,
            ])
            ->assertJson([
                'labels' => ['January'],
            ]);
    }

    /**
     * Tests output json of /admin/charts/students_attendance is valid
     */
    public function testStudentsAttendance()
    {
        $response = $this->actingAs($this->admin)->json('GET', '/admin/charts/students-attendance');

        $response->assertStatus(200)
            ->assertJson([
                'year' => date('Y'),
            ])
            ->assertJson([
                'labels' => ['January'],
            ]);
    }
}
