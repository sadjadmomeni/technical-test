<?php

namespace Tests\Feature;

use App\Models\Component;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TurbineComponentControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    use RefreshDatabase;

    public function test_get_turbines_components()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/turbines/1/components');
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
    }
    public function test_get_turbines_component()
    {
        $this->seed(DatabaseSeeder::class);
        $component = Component::find(1);
        $response = $this->getJson('/api/turbines/1/components/1');

        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $component->name);
    }

    public function test_get_turbines_component_non_existing()
    {
        $this->seed(DatabaseSeeder::class);
        $response = $this->getJson('/api/turbines/1/components/100');

        $response->assertStatus(404);
    }
}