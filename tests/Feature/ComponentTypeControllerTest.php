<?php

namespace Tests\Feature;

use App\Models\ComponentType;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ComponentTypeControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_component_types()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/component-types');
        $response->assertStatus(200);
        $response->assertJsonCount(4, 'data');
    }

    public function test_get_component_type()
    {
        $this->seed(DatabaseSeeder::class);
        $componentType = ComponentType::find(1);

        $response = $this->getJson('/api/component-types/' . $componentType->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $componentType->name);
    }
    public function test_get_component_type_not_existing()
    {
        $response = $this->getJson('/api/component-types/' . 99);
        $response->assertStatus(404);
    }
}