<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Role;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $defualtAdmin='admin@admin.com';
        $adminusersexists= User::where('email', $defualtAdmin)->first();

        if(!$adminusersexists){
            $admins = [
                [
                    'name' => 'Admin',
                    'email' => $defualtAdmin,
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Mohamed Sheta',
                    'email' => 'sheta@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Adham Tamer',
                    'email' => 'adham@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Eman',
                    'email' => 'eman@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Khaled',
                    'email' => 'khaled@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
            ];

            $adminRole = Role::where('name', 'admin')->first();

            foreach ($admins as $admin) {
                $user = User::create($admin);
                $user->roles()->attach($adminRole);
            }
        }





        $defualtTeacher='teacher@test.com';
        $teacherusersexists= User::where('email', $defualtTeacher)->first();

        if(!$teacherusersexists)
        {
            $teachers = [
                [
                    'name' => 'Teacher Test',
                    'email' => $defualtTeacher,
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Mohamed Sheta Teacher',
                    'email' => 'sheta@teacher.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Adham Tamer Teacher',
                    'email' => 'adham@teacher.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Eman Teacher',
                    'email' => 'eman@teacher.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Khaled Teacher',
                    'email' => 'khaled@teacher.com',
                    'password' => Hash::make('123456789@#'),
                ],
            ];


            $teacherRole = Role::where('name', 'teacher')->first();

            foreach ($teachers as $teacher) {
                $user = User::create($teacher);
                $user->roles()->attach($teacherRole);
            }

        }


        $defualtParent='parent@test.com';
        $parentusersexists= User::where('email', $defualtParent)->first();

        if(!$teacherusersexists)
        {
            $Parents = [
                [
                    'name' => 'Parent Test',
                    'email' => $defualtParent,
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Mohamed Sheta Parent',
                    'email' => 'sheta@parent.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Adham Tamer Parent',
                    'email' => 'adham@parent.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Eman Parent',
                    'email' => 'eman@parent.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Khaled Parent',
                    'email' => 'khaled@parent.com',
                    'password' => Hash::make('123456789@#'),
                ],
            ];


            $ParentRole = Role::where('name', 'parent')->first();

            foreach ($Parents as $Parent) {
                $user = User::create($Parent);
                $user->roles()->attach($ParentRole);
                MyParent::create(["user_id"=>$user->id]);
            }

        }

        $defualtStudent='student@test.com';
        $studentusersexists= User::where('email', $defualtStudent)->first();

        if(!$studentusersexists)
        {
            $students = [
                [
                    'name' => 'Student Test',
                    'email' => $defualtStudent,
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Mohamed Sheta Student',
                    'email' => 'sheta@student.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Adham Tamer Student',
                    'email' => 'adham@student.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Eman Student',
                    'email' => 'eman@student.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Khaled Student',
                    'email' => 'khaled@student.com',
                    'password' => Hash::make('123456789@#'),
                ],
            ];


            $studentRole = Role::where('name', 'student')->first();

            // Create instances of related models
            $grade = Grade::first();
            $gender = Gender::first();
            $nationality = Nationalitie::first();
            $bloodType = Type_Blood::first();
            $classroom = Classroom::first();
            $parent = MyParent::first();
            $religion = Religion::first();

            foreach ($students as $student) {
                $user = User::create($student);
                $user->roles()->attach($studentRole);

                // Create and persist student records
                $student1 = new Student();
                $student1->user_id = $user->id;
                $student1->name = $user->name;
                $student1->gender_id = $gender->id;
                $student1->nationality_id = $nationality->id;
                $student1->blood_type_id = $bloodType->id;
                $student1->date_birth = Carbon::parse('2005-01-01');
                $student1->grade_id = $grade->id;
                $student1->classroom_id = $classroom->id;
                $student1->parent_id = $parent->id;
                $student1->religion_id = $religion->id;
                $student1->academic_year = '2022/2023';
                $student1->save();

            }

        }


    }
}
