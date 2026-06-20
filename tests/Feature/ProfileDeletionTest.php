<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileDeletionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_delete_account_with_correct_password()
    {
        $user = Employee::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        $response->assertRedirect('/');

        $this->assertGuest();

        $this->assertDatabaseMissing('employees', [
            'id' => $user->id,
        ]);
    }

    /** @test */
    public function user_cannot_delete_account_with_wrong_password()
    {
        $user = Employee::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrors('password')
            ->assertRedirect('/profile');

        $this->assertDatabaseHas('employees', [
            'id' => $user->id,
        ]);
    }

    /** @test */
    public function deleted_user_is_logged_out()
    {
        $user = Employee::factory()->create();

        $this->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        $this->assertGuest();
    }
}