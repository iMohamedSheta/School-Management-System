<?php

namespace App\Http\Controllers\Subjects\StudentSubjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    //
    public function index()
    {
        return view('subjects.student_subjects.student-subjects');
    }
}
