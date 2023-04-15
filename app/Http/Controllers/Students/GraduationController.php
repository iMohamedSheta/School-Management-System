<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Promotions;
use App\Models\Student;


class GraduationController extends Controller
{
    //

    public function index()
    {
        return view('students.graduations.students-graduations');
    }

    public function studentsGraduatedTableView()
    {
        return view('students.graduations.graduated-students-table');
    }

    public function graduateClassroom(Request $request)
    {
        $validatedData = $request->validate([
            'grade_id' => 'required',
            'classroom_id'=>'required',
        ]);

        if($validatedData)
        {
            try {
                DB::beginTransaction();

                $students = Student::where('Grade_id',$request->grade_id)->where('Classroom_id',   $request->classroom_id)->get();

                if($students->count() < 1){
                    return redirect()->back()->with('error', __('alert.no_students_to_graduate'));
                }

                // update in table student
                foreach ($students as $student){
                    $ids = explode(',',$student->id);
                    student::whereIn('id', $ids)->update(['graduated' => true]); 
                    $graduate = student::whereIn('id', $ids)->delete(); 
                    if($graduate){
                        $promotion = Promotions::where('student_id', $student->id)->first();
                        if ($promotion) {
                            $promotion->delete();
                        }
                    }                           
                }


                $grade= Grade::findOrFail($request->grade_id);
                $classroom = Classroom::findOrFail($request->classroom_id);

                DB::commit();

                return redirect()->back()->with('success',trans('alert.students_graduated',[
                    'grade'=>$grade->name,
                    'classroom'=>$classroom->name,
                ]));
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error', trans('alert.error'));
            }
        }
    }


    public function studentGraduationBack(Request $request)
    {
        $studentId=$request->studentId;
        $student = Student::withTrashed()->findOrFail($studentId);
        $restoreStudent = $student->restore();
        $studentName=$student->name;

        if($restoreStudent)
        {
            return redirect()->back()->with('success',trans('alert.graduation_rollback',['name'=>$studentName]));
        }

        return redirect()->back()->with('error', trans('alert.error'));

    }


    public function studentSelectedGraduationBack(Request $request)
{
    $studentIds = array_filter(explode(',', $request->selected_ids));
    $successCount = 0;

    if (count($studentIds) > 0) {
        foreach ($studentIds as $studentId) {
            if(!empty($studentId)){
                $student = Student::withTrashed()->findOrFail($studentId);
                $restoreStudent = $student->restore();
                 if ($restoreStudent) {
                        $successCount++;
                    }
            }
        }
    }

    if ($successCount == count($studentIds) && $successCount > 0 ) {
        return redirect()->back()->with('success', trans('alert.graduations_rollback'));
    } else {
        return redirect()->back()->with('error', trans('alert.error'));
    }
}
}
