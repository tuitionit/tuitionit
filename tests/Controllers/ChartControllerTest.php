<?php

/**
 * Class ChartControllerTest
 */
class ChartControllerTest extends TestCase
{
    public function testPaymentsOverYear()
    {
        $response = $this->actingAs($this->admin)->json('GET', '/admin/charts/payments-over-year');

        $response->assertStatus(200)
            ->assertJson([
                'year' => date('Y'),
            ]);
    }
}
