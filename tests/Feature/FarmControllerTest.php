<?php

namespace Tests\Feature;

use App\Models\Farm;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FarmControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_farms()
    {
        Farm::factory()->count(2)->create();

        $response = $this->getJson('/api/farms');
        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }

    public function test_get_farm()
    {
        $farm = Farm::factory()->create();

        $response = $this->getJson('/api/farms/' . $farm->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $farm->name);
    }
    public function test_get_farm_not_existing()
    {
        $farm = Farm::factory()->create();

        $response = $this->getJson('/api/farms/' . 99);
        $response->assertStatus(404);
    }
}
