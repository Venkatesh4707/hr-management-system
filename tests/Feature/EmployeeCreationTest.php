<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_can_be_created()
    {
        $employee = Employee::factory()->create();

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'email' => $employee->email,
        ]);
    }
}