<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name' => 'Tokyo'],
            ['name' => 'London'],
            ['name' => 'Seattle'],
            ['name' => 'Redmond'],
            ['name' => 'Jakarta'],
            ['name' => 'New York'],
            ['name' => 'San Fransisco'],
        ])
        ->each(fn ($office) => Office::create($office));
    }
}
