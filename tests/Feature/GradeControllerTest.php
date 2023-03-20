<?php

namespace Tests\Feature;

use App\Models\Farm;
use App\Models\Grade;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GradeControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_grades()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/grades');
        $response->assertStatus(200);
        $response->assertJsonCount(12, 'data');
    }

    public function test_get_grade()
    {
        $this->seed(DatabaseSeeder::class);
        $grade = Grade::find(1);

        $response = $this->getJson('/api/grades/' . $grade->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.grade_type_id', $grade->grade_type_id);
    }
    public function test_get_farm_not_existing()
    {
        $farm = Farm::factory()->create();

        $response = $this->getJson('/api/grades/' . 99);
        $response->assertStatus(404);
    }
}