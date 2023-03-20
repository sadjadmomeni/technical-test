<?php

namespace Tests\Feature;

use App\Models\GradeType;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GradeTypeControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_grade_types()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson('/api/grade-types');
        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
    }

    public function test_get_grade_type()
    {
        $this->seed(DatabaseSeeder::class);
        $gradeType = GradeType::find(1);

        $response = $this->getJson('/api/grade-types/' . $gradeType->id);
        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $gradeType->name);
    }
    public function test_get_grade_type_not_existing()
    {
        $response = $this->getJson('/api/grade-types/' . 99);
        $response->assertStatus(404);
    }
}