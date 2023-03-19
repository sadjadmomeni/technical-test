<?php

namespace Database\Seeders;

use App\Models\GradeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ComponentType;

class GradeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Perfect'
            ],
            [
                'name' => 'Good'
            ],
            [
                'name' => 'Medium'
            ],
            [
                'name' => 'Not Good'
            ],
            [
                'name' => 'Damaged'
            ]
        ];

        GradeType::insert($data);
    }
}
