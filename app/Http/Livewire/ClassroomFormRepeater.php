<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\Grade;
use Livewire\Component;

class ClassroomFormRepeater extends Component
{
    public $fields = [];
    public $name;
    public $description;
    public $grade;


    public function addField()
    {
        $this->fields[] = [
            'name' => '',
            'description' => '',
        ];
    }

    public function removeField($index)
    {
        unset($this->fields[$index]);
        $this->fields = array_values($this->fields);
    }


    public function store()
    {
        // Initialize an empty array to store the classroom data
        $data = [];

        // Retrieve the main form data and add it to the $data array
        $name = $this->name;
        $description = $this->description;
        $grade = $this->grade;

        // Validate the main form data
        if (!empty($name) && !empty($grade)) {
            $data[] = [
                'name' => $name,
                'description' => $description,
                'grade_id'=> $grade,
            ];
        }
        else {
            // Redirect back to the index page with an error message if the main form data is not valid
            return redirect()->route('classrooms.index')->with('error', trans('alert.error-classrooms-info'));
        }

        // Loop through the fields from the repeater and add them to the $data array
        foreach ($this->fields as $index => $field) {
            $name = $field['name'];
            $description = $field['description'];
            $grade = $field['grade'];

            // Validate the field data
            if (!empty($name) && !empty($grade)) {
                $data[] = [
                    'name' => $name,
                    'description' => $description,
                    'grade_id'=> $grade,
                ];
            }
            else {
                // Redirect back to the index page with an error message if any field data is not valid
                return redirect()->route('classrooms.index')->with('error', trans('alert.error-classrooms-info'));
            }
        }

        // Save the classroom data to the database
        $create_classrooms = Classroom::insert($data);
        if($create_classrooms) {
            // Redirect back to the index page with a success message if the classroom data was saved successfully
            return redirect()->route('classrooms.index')->with('success', trans('alert.classrooms-created'));
        }

        // Redirect back to the index page with an error message if the classroom data could not be saved
        return redirect()->route('classrooms.index')->with('error', trans('alert.error-create-classrooms'));
    }




    public function render()
    {
        $grades= Grade::all();
        return view('livewire.classroom-form-repeater',compact('grades'));
    }
}
