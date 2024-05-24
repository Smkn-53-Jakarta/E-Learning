<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $extracurriculars = [
            [
                'id' => Str::uuid(),
                'name' => 'Futsal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Paskibra',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Marawis',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Extracurricular::insert($extracurriculars);
    }
}
