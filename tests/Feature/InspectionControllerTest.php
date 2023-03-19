<?php

namespace Tests\Feature;

use App\Models\Inspection;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InspectionControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_inspections()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/inspections');
        $response->assertStatus(200);
        $response->assertJsonCount(4, 'data');
    }

    public function test_get_inspection()
    {
        $this->seed(DatabaseSeeder::class);
        $inspection = Inspection::first(1);

        $response = $this->getJson('/api/inspections/' . $inspection->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.inspected_at', $inspection->inspected_at);
    }
    public function test_get_inspection_not_existing()
    {
        $response = $this->getJson('/api/inspections/' . 99);
        $response->assertStatus(404);
    }
}
