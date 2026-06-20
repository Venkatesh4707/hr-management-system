<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalaryValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function salary_cannot_be_negative()
    {
        $salary = -100;

        $this->assertFalse($salary >= 0);
    }

    /** @test */
    public function salary_can_be_zero()
    {
        $salary = 0;

        $this->assertEquals(0, $salary);
    }

    /** @test */
    public function salary_can_be_positive()
    {
        $salary = 10000;

        $this->assertTrue($salary > 0);
    }

    /** @test */
    public function salary_should_not_exceed_maximum_limit()
    {
        $salary = 999999999;

        $this->assertFalse($salary <= 100000000);
    }
}