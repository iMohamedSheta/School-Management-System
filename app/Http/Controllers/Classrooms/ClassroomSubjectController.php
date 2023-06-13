<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassroomSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomSubjectController extends Controller
{
    //
    public function index($id)
    {
        $classroom=Classroom::findOrFail($id);
        return view('classrooms.classroom-subjects.classroom-subjects',compact('classroom'));
    }

    public function deleteSelected(Request $request)
    {
        $classroom_subjectIds =array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($classroom_subjectIds) > 0) {
                try
                {
                    DB::beginTransaction();

                    foreach ($classroom_subjectIds as $classroom_subjectId)
                    {
                            $classroom_subject = ClassroomSubject::findOrFail($classroom_subjectId);
                            $classroom_subjectDelete = $classroom_subject->delete();

                            if ($classroom_subjectDelete)
                            {
                                $successCount++;
                            }

                    }
                    DB::commit();
                }
                catch(\Exception $e)
                {
                    DB::rollback();
                    return redirect()->back()->with('error',trans('alert.error'));
                }
            }
            if ($successCount == count($classroom_subjectIds) && $successCount > 0 )
            {
                return redirect()->back()->with('success',trans('alert.classroom-subjects-selected-removed'));
            }

        return redirect()->back()->with('error',trans('alert.error'));
    }


}
