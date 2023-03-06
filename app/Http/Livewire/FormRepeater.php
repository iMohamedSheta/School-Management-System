<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use Livewire\Component;

class FormRepeater extends Component
{
    public $fields = [];
    public $name;
    public $description;

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

        if (!empty($name)) {
            $data[] = [
                'name' => $name,
                'description' => $description,
            ];
        }

        // loop through fields from the repeater
        foreach ($this->fields as $index => $field) {
            $name = $field['name'];
            $description = $field['description'];

            if (!empty($name)) {
                $data[] = [
                    'name' => $name,
                    'description' => $description,
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
        return view('livewire.form-repeater');
    }
}
