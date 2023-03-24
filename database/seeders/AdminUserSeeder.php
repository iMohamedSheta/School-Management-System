<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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

            foreach ($students as $student) {
                $user = User::create($student);
                $user->roles()->attach($studentRole);
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
            }

        }


    }
}
