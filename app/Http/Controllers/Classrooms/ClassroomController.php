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


        // Validate the request data
        $validatedData = Validator::make([
            'name*' => 'required|string|max:255',
            'description*' => 'nullable|string',
        ])->validate();

        if ($validatedData) {
            // Loop through each field and store it in the database
            foreach ($validatedData as $field) {
                // Create a new Classroom model instance
                $classroom = new Classroom;
                $classroom->name = $field['name'];
                $classroom->description = $field['description'];
                $classroom->save();
            }
            return redirect()->route('classrooms.index')
                             ->with('success', 'Classroom created successfully');
        }

        return redirect()->route('classrooms.index')
                         ->with('error', trans('alert.error'));
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

        return redirect()->route('classrooms.index')
                            ->with('success', 'Classroom updated successfully');
    }



    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route("classrooms.index")
                                ->with('success', 'Classroom deleted successfully');
    }
}
