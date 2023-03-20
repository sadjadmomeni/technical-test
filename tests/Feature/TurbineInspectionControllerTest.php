<?php

namespace Tests\Feature;

use App\Models\Inspection;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TurbineInspectionControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    use RefreshDatabase;

    public function test_get_turbines_inspections()
    {
        $this->seed(DatabaseSeeder::class);
        $response = $this->getJson('/api/turbines/1/inspections');
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
    }
    public function test_get_turbines_inspection()
    {
        $this->seed(DatabaseSeeder::class);
        $inspection = Inspection::find(1);
        $response = $this->getJson('/api/turbines/1/inspections/1');
        $response->assertStatus(200);
        $response->assertJsonPath('data.inspected_at', $inspection->inspected_at);
    }

    public function test_get_turbines_inspection_non_existing()
    {
        $this->seed(DatabaseSeeder::class);
        $response = $this->getJson('/api/turbines/1/inspections/100');
        $response->assertStatus(404);
    }
}
