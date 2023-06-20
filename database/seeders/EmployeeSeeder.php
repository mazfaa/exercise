<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Nikola Tesla',
                'position_id' => 1,
                'office_id' => 1,
                'photo' => '/employee/tesla.jpeg'
            ],

            [
                'name' => 'Sir Isaac Newton',
                'position_id' => 2,
                'office_id' => 2,
                'photo' => '/employee/newton.jpg'
            ],

            [
                'name' => 'Leonardo Da Vinci',
                'position_id' => 3,
                'office_id' => 3,
                'photo' => '/employee/leonardo.jpg'
            ],

            [
                'name' => 'William James Sidis',
                'position_id' => 4,
                'office_id' => 4,
                'photo' => '/employee/sidis.jpg'
            ],
        ])
        ->each(fn ($employee) => Employee::create($employee));
    }
}
