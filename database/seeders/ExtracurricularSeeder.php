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
                'name' => 'Futsal'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Paskibra'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Marawis'
            ],
        ];

        Extracurricular::insert($extracurriculars);
    }
}
