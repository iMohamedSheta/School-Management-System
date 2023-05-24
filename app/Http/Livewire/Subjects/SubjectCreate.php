<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;

class SubjectCreate extends Component
{
    public $name;
    public $description;
    public $teacher_id;



    public function render()
    {
        $teachers=Teacher::all();

        return view('livewire.subjects.subject-create',compact('teachers'));
    }


    public function createSubject()
    {
        $validatedData = $this->validate([
            'name'=>'string|required',
            'teacher_id' => 'nullable|exists:teachers,id',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {
            $createSubject = Subject::create([
                'name'=>$this->name,
                'teacher_id'=>$this->teacher_id,
                'description'=>$this->description,
            ]);

            if($createSubject)
            {
                return redirect()->route('subjects.index')->with('success',trans('alert.subject-created',['name'=>$createSubject->name]));
            }
        }

        return redirect()->route('subjects.create')->with('error',trans('alert.error'));
    }

}
