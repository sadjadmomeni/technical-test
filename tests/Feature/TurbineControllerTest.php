<?php

namespace Tests\Feature;

use App\Models\Turbine;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TurbineControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    use RefreshDatabase;

    public function test_get_turbines()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/turbines');
        $response->assertStatus(200);
        $response->assertJsonCount(4, 'data');
    }

    public function test_get_turbine()
    {
        $this->seed(DatabaseSeeder::class);

        $turbine = Turbine::first(1);
        $response = $this->getJson('/api/turbines/' . $turbine->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $turbine->name);
    }
    public function test_get_turbine_not_existing()
    {
        $response = $this->getJson('/api/turbine/' . 99);
        $response->assertStatus(404);
    }
}