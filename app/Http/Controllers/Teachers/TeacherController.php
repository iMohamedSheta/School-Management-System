<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;

class TeacherController extends Controller
{
    //

    public function index()
    {
        return view('teachers.teachers');
    }

    public function teacherInfoView($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.teacher-info',compact('teacher'));
    }

    public function teacherInfoEditView($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.teacher-info-edit',compact('teacher'));
    }

    public function teacherEmailEditView($id)
    {
        $teacher_user = User::findOrFail($id);
        return view('teachers.teacher-email-edit',compact('teacher_user'));
    }

    public function destroy(Request $request)
    {

            $userId = $request->teacherIdForDelete;
            $user = User::where('id',$userId)->first();
            $userName=$user->teacher->teacher_name;
            $deleteTeacherUser = $user->delete();

            if($deleteTeacherUser)
            {
                return redirect()->back()->with('success', trans('alert.delete_teacher_success',['name'=>$userName]));
            }

        return redirect()->back()->with('error', trans('alert.error'));

    }


    public function deleteSelected(Request $request)
    {

            $selectedIds = explode(',', $request->selected_teachers_ids);

        //Loop through the selected students to get the user account and put all the id in array

            foreach ($selectedIds as $id)
            {
                $idsToDelete[] = $id;
            }

            if(empty($idsToDelete))
            {
                return redirect()->back()->with('error', trans('alert.errorselect'));
            }


            if (count($idsToDelete) > 0) {

                User::destroy($idsToDelete);
                return redirect()->back()->with('success', trans('alert.deletedselected'));
            }

        return redirect()->back()->with('error', trans('alert.error'));
    }

}
