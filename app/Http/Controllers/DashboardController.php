<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $users_number = User::countUsers();
        $new_users_percentage = User::getNewUserPercentage();

        $students_number = Student::countStudents();
        $new_students_percentage = Student::getNewStudentPercentage();

        $teachers_number = Teacher::countTeachers();
        $new_teachers_percentage = Teacher::getNewTeacherPercentage();

        $classroom_number = Classroom::countClassrooms();

        return view('dashboard',compact(
            'users_number',
            'new_users_percentage',
            'students_number',
            'new_students_percentage',
            'teachers_number',
            'new_teachers_percentage',
            'classroom_number',
        ));
    }


}
