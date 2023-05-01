<?php

namespace App\Http\Controllers\Attendances;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class AttendancesController extends Controller
{
    //

    public function index()
    {
        $grades=Grade::all();
        return view('attendances.classrooms-attendances',compact('grades'));
    }
}
