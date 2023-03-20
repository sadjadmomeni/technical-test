<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\Farm;
use App\Models\Grade;
use App\Models\Inspection;
use App\Models\Turbine;
use App\Models\User;
use Database\Factories\FarmFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ComponentTypeSeeder::class,
            GradeTypeSeeder::class,
        ]);

        User::factory()->create();

        $farm = Farm::factory()->create();
        $farm2 = Farm::factory()->create();

        $turbine = Turbine::factory()->create([
            'lat' => 54.768136993764834,
            'long' => -1.8206857153429397,
            'farm_id' => $farm->id
        ]);
        $turbine2 = Turbine::factory()->create([
            'lat' => 54.768337993764834,
            'long' => -1.8226957153429397,
            'farm_id' => $farm->id
        ]);
        $turbine3 = Turbine::factory()->create([
            'lat' => 54.768536993764834,
            'long' => -1.8246857153429397,
            'farm_id' => $farm2->id
        ]);
        $turbine4 = Turbine::factory()->create([
            'lat' => 54.768937993764834,
            'long' => -1.8266957153429397,
            'farm_id' => $farm2->id
        ]);

        $component = Component::factory()->create([
            'turbine_id' => $turbine->id,
            'component_type_id' => 1
        ]);
        $component2 = Component::factory()->create([
            'turbine_id' => $turbine->id,
            'component_type_id' => 2
        ]);
        $component3 = Component::factory()->create([
            'turbine_id' => $turbine->id,
            'component_type_id' => 3
        ]);
        $inspection = Inspection::factory()->create([
            'turbine_id' => $turbine->id
        ]);
        Inspection::factory()->create([
            'turbine_id' => $turbine->id
        ]);
        Inspection::factory()->create([
            'turbine_id' => $turbine->id
        ]);

        Grade::factory()->create([
            'inspection_id' => $inspection->id,
            'component_id' => $component->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection->id,
            'component_id' => $component2->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection->id,
            'component_id' => $component3->id
        ]);


        $component4 = Component::factory()->create([
            'turbine_id' => $turbine2->id,
            'component_type_id' => 1
        ]);
        $component5 = Component::factory()->create([
            'turbine_id' => $turbine2->id,
            'component_type_id' => 2
        ]);
        $component6 = Component::factory()->create([
            'turbine_id' => $turbine2->id,
            'component_type_id' => 3
        ]);
        $inspection2 = Inspection::factory()->create([
            'turbine_id' => $turbine2->id
        ]);
        Inspection::factory()->create([
            'turbine_id' => $turbine2->id
        ]);

        Grade::factory()->create([
            'inspection_id' => $inspection2->id,
            'component_id' => $component4->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection2->id,
            'component_id' => $component5->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection2->id,
            'component_id' => $component6->id
        ]);

        $component7 = Component::factory()->create([
            'turbine_id' => $turbine3->id,
            'component_type_id' => 1
        ]);
        $component8 = Component::factory()->create([
            'turbine_id' => $turbine3->id,
            'component_type_id' => 2
        ]);
        $component9 = Component::factory()->create([
            'turbine_id' => $turbine3->id,
            'component_type_id' => 3
        ]);
        $inspection3 = Inspection::factory()->create([
            'turbine_id' => $turbine3->id
        ]);
        Inspection::factory()->create([
            'turbine_id' => $turbine3->id
        ]);

        Grade::factory()->create([
            'inspection_id' => $inspection3->id,
            'component_id' => $component7->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection3->id,
            'component_id' => $component8->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection3->id,
            'component_id' => $component9->id
        ]);

        $component10 = Component::factory()->create([
            'turbine_id' => $turbine4->id,
            'component_type_id' => 1
        ]);
        $component11 = Component::factory()->create([
            'turbine_id' => $turbine4->id,
            'component_type_id' => 2
        ]);
        $component12 = Component::factory()->create([
            'turbine_id' => $turbine4->id,
            'component_type_id' => 3
        ]);
        $inspection4 = Inspection::factory()->create([
            'turbine_id' => $turbine4->id
        ]);
        Inspection::factory()->create([
            'turbine_id' => $turbine4->id
        ]);

        Grade::factory()->create([
            'inspection_id' => $inspection4->id,
            'component_id' => $component10->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection4->id,
            'component_id' => $component11->id
        ]);
        Grade::factory()->create([
            'inspection_id' => $inspection4->id,
            'component_id' => $component12->id
        ]);

    }
}