<?php

namespace App\Http\Controllers\Classrooms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{


    public function index()
    {
        $classrooms = Classroom::paginate(10);
        return view("classrooms", compact('classrooms'));
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



    public function update(Request $request, Classroom $classroom)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $classroom->update($validatedData);

        return redirect()->back()->with('success', trans('alert.update_classroom_success'));

    }



    public function destroy(Classroom $classroom)
    {
        $classroom::where('id',$classroom->id)->get();
        $classroom->delete();

        return redirect()->back()->with('success', trans('alert.delete_classroom_success',['name'=>$classroom->name]));

    }
}
