<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Promotions;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    //

    public function index()
    {
        return view('students.promotions.students-promotions');
    }
    public function studentsPromotionsTableView()
    {
        return view('students.promotions.students-promotions-table');
    }



    public function promoteClassroom(Request $request)
    {
        $validatedData = $request->validate([
            'from_grade' => 'required',
            'from_classroom'=>'required',
            'to_grade' => 'required',
            'to_classroom'=>'required',
        ]);

        if($validatedData)
        {
            try {

                $students = Student::where('Grade_id',$request->from_grade)->where('Classroom_id',$request->from_classroom)->get();

                if($students->count() < 1){
                    return redirect()->back()->with('error', trans('alert.no_students_to_promote'));
                }

                DB::beginTransaction();
                // update in table student
                foreach ($students as $student){
                    $ids = explode(',',$student->id);
                    student::whereIn('id', $ids)
                        ->update([
                            'Grade_id'=>$request->to_grade,
                            'Classroom_id'=>$request->to_classroom,
                        ]);

                    $promotion = Promotions::where('student_id', $student->id)->first();
                    if ($promotion) {
                        $promotion->update([
                            'from_grade' => $request->from_grade,
                            'from_classroom' => $request->from_classroom,
                            'to_grade' => $request->to_grade,
                            'to_classroom' => $request->to_classroom,
                        ]);
                    } else {
                        Promotions::create([
                            'student_id' => $student->id,
                            'from_grade' => $request->from_grade,
                            'from_classroom' => $request->from_classroom,
                            'to_grade' => $request->to_grade,
                            'to_classroom' => $request->to_classroom,
                        ]);
                    }
                }


                $from_grade= Grade::findOrFail($request->from_grade);
                $to_grade= Grade::findOrFail($request->to_grade);
                $from_classroom = Classroom::findOrFail($request->from_classroom);
                $to_classroom = Classroom::findOrFail($request->to_classroom);

                DB::commit();

                return redirect()->back()->with('success',trans('alert.students_promoted',[
                    'old_grade'=>$from_grade->name,
                    'old_classroom'=>$from_classroom->name,
                    'new_grade'=>$to_grade->name,
                    'new_classroom'=>$to_classroom->name,
                ]));
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error', trans('alert.error'));
            }
        }
    }


    public function studentPromotionBack(Request $request)
    {
        $validatedData = $request->validate([
            'promotionId' => 'required|exists:promotions,id',
        ]);

        if($validatedData)
        {


        $promotion =  Promotions::findOrFail($request->promotionId);
        if($promotion)
        {
            $student = Student::findOrFail($promotion->student_id);

           $studentUpdate= $student->update([
                'grade_id'=>$promotion->from_grade,
                'classroom_id'=>$promotion->from_classroom,
            ]);

            if($studentUpdate){
                $studentName =$promotion->student->name;
                $promotionUpdate = $promotion->delete();

                if($promotionUpdate)
                {
                    return redirect()->back()->with('success',trans('alert.promotion_rollback',['name'=>$studentName]));
                }

            }

        }
    }

    return redirect()->back()->with('error',trans('alert.error'));
}



    public function studentSelectedPromotionBack(Request $request)
    {
        $promotionIds = array_filter(explode(',', $request->selected_ids));
        $successCount = 0;

        if (count($promotionIds) > 0) {
            foreach ($promotionIds as $promotionId) {
                if(!empty($promotionId)){
                $promotion = Promotions::findOrFail($promotionId);
                if ($promotion) {
                    $student = Student::findOrFail($promotion->student_id);

                    $studentUpdate = $student->update([
                        'grade_id' => $promotion->from_grade,
                        'classroom_id' => $promotion->from_classroom,
                    ]);

                    if ($studentUpdate) {
                        $promotionUpdate = $promotion->delete();

                        if ($promotionUpdate) {
                            $successCount++;
                        }
                    }
                }
            }
            }
        }

        if ($successCount == count($promotionIds) && $successCount > 0 ) {
            return redirect()->back()->with('success', trans('alert.promotions_rollback'));
        } else {
            return redirect()->back()->with('error', trans('alert.error'));
        }
    }


}
