<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_registration_success()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Sally', 
            'email' => 'Sally@gmail.com',
            'password' => 'Sally123', 
            'confirm_password' => 'Sally123'
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
    }

    public function test_registration_fail_missing_parameter()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Sally', 
            'password' => 'Sally123', 
            'confirm_password' => 'Sally123'
        ]);

        $response->assertStatus(404);
        $response->assertJsonPath('success', false);
    }


    public function test_registration_fail_duplicated_email()
    {
        User::factory()->create(['email' => 'test@gmail.com']);
        $response = $this->postJson('/api/register', [
            'name' => 'Sally', 
            'email' => 'test@gmail.com',
            'password' => 'Sally123', 
            'confirm_password' => 'Sally123'
        ]);

        $response->assertStatus(404);
        $response->assertJsonPath('success', false);
    }
}
