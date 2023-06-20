<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name' => 'Marketing'],
            ['name' => 'Accountant'],
            ['name' => 'Software Engineer'],
            ['name' => 'Chief Executive Officer'],
            ['name' => 'Human Resource Development'],
        ])
        ->each(fn ($position) => Position::create($position));
    }
}
