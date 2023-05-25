<?php

namespace App\Http\Controllers\Parents\ParentStudents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentStudentController extends Controller
{
    //

    public function index()
    {
        return view('parents.parent-students.parent-students');
    }
}
