<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    public function run()
    {
        DB::table('classrooms')->delete();
        DB::table('grades')->delete();

        $grades = [
            [
                'name' => ['en' => 'Kindergarten (KG)', 'ar' => 'رياض الأطفال'],
                'notes' => 'Some notes about KG',
            ],
            [
                'name' => ['en' => 'First Grade (1st)', 'ar' => 'الصف الأول الابتدائي'],
                'notes' => 'Some notes about Grade 1',
            ],
            [
                'name' => ['en' => 'Second Grade (2nd)', 'ar' => 'الصف الثاني الابتدائي'],
                'notes' => 'Some notes about Grade 2',
            ],
            [
                'name' => ['en' => 'Third Grade (3rd)', 'ar' => 'الصف الثالث الابتدائي'],
                'notes' => 'Some notes about Grade 3',
            ],
            [
                'name' => ['en' => 'Fourth Grade (4th)', 'ar' => 'الصف الرابع الابتدائي'],
                'notes' => 'Some notes about Grade 4',
            ],
            [
                'name' => ['en' => 'Fifth Grade (5th)', 'ar' => 'الصف الخامس الابتدائي'],
                'notes' => 'Some notes about Grade 5',
            ],
            [
                'name' => ['en' => 'Sixth Grade (6th)', 'ar' => 'الصف السادس الابتدائي'],
                'notes' => 'Some notes about Grade 6',
            ],
            [
                'name' => ['en' => 'Seventh Grade (7th)', 'ar' => 'الصف السابع الأساسي'],
                'notes' => 'Some notes about Grade 7',
            ],
            [
                'name' => ['en' => 'Eighth Grade (8th)', 'ar' => 'الصف الثامن الأساسي'],
                'notes' => 'Some notes about Grade 8',
            ],
            [
                'name' => ['en' => 'Ninth Grade (9th)', 'ar' => 'الصف التاسع الأساسي'],
                'notes' => 'Some notes about Grade 9',
            ],
            [
                'name' => ['en' => 'Tenth Grade (10th)', 'ar' => 'الصف العاشر الثانوي'],
                'notes' => 'Some notes about Grade 10',
            ],
            [
                'name' => ['en' => 'Eleventh Grade (11th)', 'ar' => 'الصف الحادي عشر الثانوي'],
                'notes' => 'Some notes about Grade 11',
            ],
            [
                'name' => ['en' => 'Twelfth Grade (12th)', 'ar' => 'الصف الثاني عشر الثانوي'],
                'notes' => 'Some notes about Grade 12',
            ],
        ];


        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}

