<?php

namespace App\Http\Controllers\Classrooms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{


    public function index()
    {
        $classrooms = Classroom::paginate(10);
        $grades = Grade::all();
        return view("classrooms", compact('classrooms',"grades"));
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {

            // The Store Method now on FormRepeater Class in livewire folder

    }






    public function show(Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }



    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }



    public function update(Request $request)
    {
        $classroom= Classroom::where('id',$request->id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'grade'=>'required'
        ]);

        $classroom->update(
            [
                'name'=>$request->name,
                'description'=>$request->description,
                'grade_id'=>$request->grade
            ]
        );

        return redirect()->back()->with('success', trans('alert.update_classroom_success'));

    }



    public function destroy(Classroom $classroom)
    {
        $classroom::where('id',$classroom->id)->get();
        $classroom->delete();

        return redirect()->back()->with('success', trans('alert.delete_classroom_success',['name'=>$classroom->name]));

    }


    public function deleteSelected(Request $request)
    {
            $selectedIds = explode(',', $request->selected_classrooms_ids);


           // Loop through the selected grades and check if they have classrooms
            foreach ($selectedIds as $id)
            {

                $classroom = Classroom::find($id);
                // If the grade doesn't have classrooms, add its ID to the $idsToDelete array
                if ($classroom) {
                    $idsToDelete[] = $id;
                }
            }

            if(empty($idsToDelete))
            {
                return redirect()->back()->with('error', trans('alert.errorselect'));
            }

            if (count($idsToDelete) > 0) {
                Classroom::destroy($idsToDelete);

                return redirect()->back()->with('success', trans('alert.deletedselected'));
            }

            return redirect()->back()->with('error', trans('alert.error'));

    }



    public function filterGrades(Request $request)
    {
        $grade_id = $request->Grade_id;
        if($grade_id == "AllGrades")
        {
            return Redirect::route('classrooms.index');
        }
        $grades = Grade::all();
        $classrooms= Classroom::select('*')->where('grade_id',$grade_id)->paginate();
        return view("classrooms",compact('grades','classrooms'));
    }

}
