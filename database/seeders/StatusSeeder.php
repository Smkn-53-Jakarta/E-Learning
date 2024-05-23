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
                'name' => 'Aktif'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Tidak Aktif'
            ],
        ];

        Status::insert($statuses);
    }
}
