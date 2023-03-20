<?php

namespace Tests\Feature;

use App\Models\Component;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ComponentControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_components()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/components');
        $response->assertStatus(200);
        $response->assertJsonCount(12, 'data');
    }

    public function test_get_component()
    {
        $this->seed(DatabaseSeeder::class);
        $component = Component::first(1);

        $response = $this->getJson('/api/components/' . $component->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $component->name);
    }
    public function test_get_component_not_existing()
    {
        $response = $this->getJson('/api/components/' . 99);
        $response->assertStatus(404);
    }
}