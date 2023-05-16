<?php

namespace App\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //

    public function index()
    {
        return view('exams.exams');
    }
    public function viewCreateExam()
    {
        return view('exams.exam-create');
    }

    public function deleteSelected(Request $request)
    {
        $examIds =array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($examIds) > 0) {
                foreach ($examIds as $examId) {
                    if(!empty($examId)){
                        $exam = Exam::findOrFail($examId);
                        $examDelete = $exam->delete();
                        if ($examDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($examIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.exams_deleted'));
            }


        return redirect()->back()->with('error',trans('alert.error'));
    }
}
