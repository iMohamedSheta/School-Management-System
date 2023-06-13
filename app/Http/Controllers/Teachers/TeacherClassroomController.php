<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherClassroom;
use Illuminate\Http\Request;

class TeacherClassroomController extends Controller
{
    //

    public function index()
    {
        return view('teachers.teacher_classrooms.teacher_classrooms');
    }
    public function viewTeacherClassrooms()
    {
        return view('teacher_classrooms.teacher_classrooms');
    }


    public function create($id)
    {
        $teacher= Teacher::findOrFail($id);
        return view('teachers.teacher_classrooms.assign_teacher_classrooms',compact('teacher'));
    }


    public function destroy(Request $request)
    {
        $teacherClassroom=TeacherClassroom::findOrFail($request->teacherClassroomIdForDelete);
        $teacherName=$teacherClassroom->teacher->name;
        $classroom=$teacherClassroom->classroom->name;
        $removeAssign = $teacherClassroom->delete();

        if($removeAssign)
        {
            return redirect()->back()->with('success',trans('alert.remove-assign-classroom',['name'=>$teacherName,'classroom'=>$classroom]));
        }

        return redirect()->back()->with('error',trans('alert.error'));
    }


    public function deleteSelected(Request $request)
    {
        $teacherClassroomIds =array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($teacherClassroomIds) > 0) {
                foreach ($teacherClassroomIds as $teacherClassroomId) {
                    if(!empty($teacherClassroomId)){
                        $teacherclassroom = TeacherClassroom::findOrFail($teacherClassroomId);
                        $teacherclassroomDelete = $teacherclassroom->delete();
                        if ($teacherclassroomDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($teacherClassroomIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.teacherclassrooms_deleted'));
            }


        return redirect()->back()->with('error',trans('alert.error'));
    }

}
