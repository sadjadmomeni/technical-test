<?php

namespace Tests\Feature;

use App\Models\Turbine;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FarmTurbineControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    use RefreshDatabase;

    public function test_get_farm_tubines()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/farms/1/turbines');
        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }
    public function test_get_farm_tubine()
    {
        $this->seed(DatabaseSeeder::class);
        $turbine = Turbine::find(1);
        $response = $this->getJson('/api/farms/1/turbines/1');

        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $turbine->name);
    }

    public function test_get_farm_tubine_non_existing()
    {
        $this->seed(DatabaseSeeder::class);
        $response = $this->getJson('/api/farms/1/turbines/100');
        $response->assertStatus(404);
    }
}