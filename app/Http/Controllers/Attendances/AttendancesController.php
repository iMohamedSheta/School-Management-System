<?php

namespace App\Http\Controllers\Attendances;


use App\Http\Controllers\Controller;
use App\Models\Attendances;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;

class AttendancesController extends Controller
{
    //

    public function index()
    {
        $grades=Grade::all();
        return view('attendances.attendances',compact('grades'));
    }

    public function viewAttendanceReport()
    {
        return view('attendances.attendance-report.create-attendance-report');
    }


    public function viewAttendanceClassroom($id)
    {
        $students=Student::where('classroom_id',$id)->get();
        $classroom=Classroom::findOrFail($id);
        return view('attendances.attendance-classroom',compact('students','classroom'));
    }
    public function store(Request $request)
    {
        try
        {
            $attendances =  $request->attendances;
            foreach ($attendances as $studentId => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

                $createAttendence = new Attendances();
                $createAttendence->student_id =$studentId;
                $createAttendence->grade_id = $request->grade_id;
                $createAttendence->classroom_id = $request->classroom_id;
                $createAttendence->attendence_status = $attendence_status;
                $createAttendence->attendence_date = date('Y-m-d');
                if(auth()->user()->isTeacher())
                {
                    $createAttendence->teacher_id = auth()->user()->teacher->id;
                }
                $createAttendence->save();

            }
            $classroom = Classroom::findOrFail($request->classroom_id);

            return redirect()->back()->with('success',trans('alert.added-attendance-for-today',['classroom'=>$classroom->name,'day'=>date('Y-m-d')]));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error',trans('alert.error'));
        }

    }
}
