<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //

    public function index()
    {
        return view('subjects.subjects');
    }
    public function viewCreateSubject()
    {
        return view('subjects.create-subject');
    }

    public function deleteSelected(Request $request)
    {
        $subjectIds =array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($subjectIds) > 0) {
                foreach ($subjectIds as $subjectId) {
                    if(!empty($subjectId)){
                        $subject = Subject::findOrFail($subjectId);
                        $subjectDelete = $subject->delete();
                        if ($subjectDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($subjectIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.subjects_deleted'));
            }


        return redirect()->back()->with('error',trans('alert.error'));
    }



}
