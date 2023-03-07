<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\Grade;
use Livewire\Component;

class FormRepeater extends Component
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
        $data = [];
        // add the main form data to the $data array
        $name = $this->name;
        $description = $this->description;
        $grade = $this->grade;

        if (!empty($name)) {
            $data[] = [
                'name' => $name,
                'description' => $description,
                'grade_id'=> $grade,
            ];
        }

        // loop through fields from the repeater
        foreach ($this->fields as $index => $field) {
            $name = $field['name'];
            $description = $field['description'];
            $grade = $field['grade'];

            if (!empty($name)) {
                $data[] = [
                    'name' => $name,
                    'description' => $description,
                    'grade_id'=> $grade,
                ];
            }
        }



        // do something with $data, such as save to database
        Classroom::insert($data);

        session()->flash('success', 'Classroom created successfully...');
        return redirect()->route('classrooms.index');
    }



    public function render()
    {
        $grades= Grade::all();
        return view('livewire.form-repeater',compact('grades'));
    }
}
