<?php

namespace Tests\Feature;

use App\Models\Farm;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_login_success()
    {
        User::factory()->create(['email' => 'test@gmail.com']);

        $response = $this->postJson('/api/login', [
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
    }

    public function test_login_unsuccess()
    {
        User::factory()->create(['email' => 'test@gmail.com']);

        $response = $this->postJson('/api/login', [
            'email' => 'test@gmail.com',
            'password' => 'passwordIncorrect'
        ]);

        $response->assertStatus(404);
        $response->assertJsonPath('success', false);
    }

    public function test_api_token_on_api_calls_success()
    {
        User::factory()->create(['email' => 'test@gmail.com']);
        Farm::factory()->create();
        $responseLogin = $this->postJson('/api/login', [
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);
        $token = $responseLogin['data']['token'];
        
        $response = $this->withHeaders(['Authorization'=> 'Bearer '. $token])->getJson('/api/farms');
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
    }

    public function test_api_token_on_api_calls_invalid_token()
    {
        User::factory()->create(['email' => 'test@gmail.com']);
        Farm::factory()->create();
        
        $response = $this->withHeaders(['Authorization'=> 'Bearer '. 'invalidToken'])->getJson('/api/farms');
        $response->assertStatus(401);
    }
}
