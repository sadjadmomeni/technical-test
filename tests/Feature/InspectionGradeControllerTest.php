<?php

namespace Tests\Feature;

use App\Models\Grade;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InspectionGradeControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_inspection_grades()
    {
        $this->seed(DatabaseSeeder::class);
        $response = $this->getJson('/api/inspections/1/grades');
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
    }

    public function test_get_inspection_grade()
    {
        $this->seed(DatabaseSeeder::class);
        $grade = Grade::first(1);

        $response = $this->getJson('/api/inspections/1/' . $grade->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.grade_type_id', $grade->grade_type_id);
    }
    public function test_get_inspection_grade_not_existing()
    {
        $response = $this->getJson('/api/inspections/1/grades/999');
        $response->assertStatus(404);
    }
}