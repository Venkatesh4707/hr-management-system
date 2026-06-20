<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'national_id' => fake()->unique()->numerify('2#############'),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'bank_acc_no' => fake()->iban(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'department_id' => Department::factory(),
            'branch_id' => Branch::factory(),
            'hired_on' => Carbon::createFromTimestamp(mt_rand(Carbon::now()->subYears(3)->timestamp, Carbon::now()->timestamp))->format('Y-m-d'),
            'is_remote' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
