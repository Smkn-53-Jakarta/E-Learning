<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            [
                'id' => Str::uuid(),
                'name' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Tidak Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Status::insert($statuses);
    }
}