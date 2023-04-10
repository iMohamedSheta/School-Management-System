<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Student Table is livewire Componenet so we use livewire Controller Called StudentsTable to add the Students Livewire Methods.


    public function index()
    {
        return view('students.students');
    }

    public function studentInfoView($id)
    {
        $student = Student::findOrFail($id);
        return view('students.student-info',compact('student'));
    }

    public function studentInfoEditView($id)
    {
        $student = Student::findOrFail($id);
        return view("students.student-info-edit",compact('student'));
    }


    public function studentEmailEditView($id)
    {
        $student_user = User::findOrFail($id);

        return view("students.student-email-edit",compact('student_user'));
    }


    public function destroy(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $userId = $request->studentIdForDelete;
            $user = User::where('id',$userId)->first();
            $userName=$user->student->name;
            $deleteStudentUser = $user->delete();

            if($deleteStudentUser)
            {
                return redirect()->back()->with('success', trans('alert.delete_student_success',['name'=>$userName]));
            }
        }

        return redirect()->back()->with('error', trans('alert.error'));

    }


    public function deleteSelected(Request $request)
    {

        if(auth()->user()->isAdmin())
        {
            $selectedIds = explode(',', $request->selected_students_ids);


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
        }

        return redirect()->back()->with('error', trans('alert.error'));
    }
}
