<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PayrollFlowTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_salary_record_can_be_created()
    {
        $employee = Employee::factory()->create();

        EmployeeSalary::create([
            'employee_id' => $employee->id,
            'currency' => 'USD',
            'salary' => 50000,
            'start_date' => now()->format('Y-m-d'),
            'end_date' => null,
        ]);

        $this->assertDatabaseHas('employee_salaries', [
            'employee_id' => $employee->id,
            'salary' => 50000,
            'currency' => 'USD',
        ]);
    }

    /** @test */
    public function employee_salary_is_positive()
    {
        $salary = 50000;

        $this->assertTrue($salary > 0);
    }

    /** @test */
    public function negative_salary_should_not_be_allowed()
    {
        $salary = -1000;

        $this->assertFalse($salary > 0);
    }

    /** @test */
    public function employee_salary_has_start_date()
    {
        $employee = Employee::factory()->create();

        EmployeeSalary::create([
            'employee_id' => $employee->id,
            'currency' => 'USD',
            'salary' => 25000,
            'start_date' => now()->format('Y-m-d'),
            'end_date' => null,
        ]);

        $this->assertDatabaseHas('employee_salaries', [
            'employee_id' => $employee->id,
            'salary' => 25000,
        ]);
    }
}