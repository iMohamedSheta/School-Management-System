<?php

namespace Database\Seeders;

use App\Models\Student;
use Database\Factories\StudentsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
        {
            Student::factory(StudentsFactory::class)->count(100)->create();
        }

}
