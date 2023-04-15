<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    public function run()
    {
        DB::table('classrooms')->delete();

            $classrooms = [
                [
                    'name' => 'KG1',
                    'grade_id' => Grade::where('name','like', '%'.'Kindergarten (KG)'.'%')->first()->id
                ],
                [
                    'name' => 'KG2',
                    'grade_id' => Grade::where('name','like', '%'.'Kindergarten (KG)'.'%')->first()->id
                ],
                [
                    'name' => '1/1',
                    'grade_id' => Grade::where('name','like', '%'.'First Grade (1st)'.'%')->first()->id
                ],
                [
                    'name' => '1/2',
                    'grade_id' => Grade::where('name','like', '%'.'First Grade (1st)'.'%')->first()->id
                ],
                [
                    'name' => '2/1',
                    'grade_id' => Grade::where('name','like', '%'.'Second Grade (2nd)'.'%')->first()->id
                ],
                [
                    'name' => '2/2',
                    'grade_id' => Grade::where('name','like', '%'.'Second Grade (2nd)'.'%')->first()->id
                ],
                [
                    'name' => '3/1',
                    'grade_id' => Grade::where('name','like', '%'.'Third Grade (3rd)'.'%')->first()->id
                ],
                [
                    'name' => '3/2',
                    'grade_id' => Grade::where('name','like', '%'.'Third Grade (3rd)'.'%')->first()->id
                ],
                [        
                    'name' => '4/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Fourth Grade (4th)'.'%')->first()->id
                ],
                [        
                    'name' => '4/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Fourth Grade (4th)'.'%')->first()->id
                ],
                [        
                    'name' => '5/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Fifth Grade (5th)'.'%')->first()->id
                ],
                [        
                    'name' => '5/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Fifth Grade (5th)'.'%')->first()->id
                ],
                [        
                    'name' => '6/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Sixth Grade (6th)'.'%')->first()->id
                ],
                [        
                    'name' => '6/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Sixth Grade (6th)'.'%')->first()->id
                ],
                [        
                    'name' => '7/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Seventh Grade (7th)'.'%')->first()->id
                ],
                [        
                    'name' => '7/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Seventh Grade (7th)'.'%')->first()->id
                ],
                [        
                    'name' => '8/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Eighth Grade (8th)'.'%')->first()->id
                ],
                [        
                    'name' => '8/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Eighth Grade (8th)'.'%')->first()->id
                ],
                [        
                    'name' => '9/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Ninth Grade (9th)'.'%')->first()->id
                ],
                [        
                    'name' => '9/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Ninth Grade (9th)'.'%')->first()->id
                ],
                [        
                    'name' => '10/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Tenth Grade (10th)'.'%')->first()->id
                ],
                [        
                    'name' => '10/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Tenth Grade (10th)'.'%')->first()->id
                ],
                [        
                    'name' => '11/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Eleventh Grade (11th)'.'%')->first()->id
                ],
                [        
                    'name' => '11/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Eleventh Grade (11th)'.'%')->first()->id
                ],
                [        
                    'name' => '12/1',        
                    'grade_id' => Grade::where('name','like', '%'.'Twelfth Grade (12th)'.'%')->first()->id
                ],
                [        
                    'name' => '12/2',        
                    'grade_id' => Grade::where('name','like', '%'.'Twelfth Grade (12th)'.'%')->first()->id
                ],

        ];


        foreach ($classrooms as $classroom) {
            Classroom::create($classroom);
        }
    }
}

