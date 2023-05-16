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
    public $grade_id;
    public $classroom_id;
    public $teacher_id;
    public $classrooms=[];

    protected $listeners = ['updatedGradeId'];


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }


    public function render()
    {
        $grades=Grade::all();
        $teachers=Teacher::all();

        return view('livewire.subjects.subject-create',compact('grades','teachers'));
    }


    public function createSubject()
    {
        $validatedData = $this->validate([
            'name'=>'string|required',
            'teacher_id' => 'nullable|exists:teachers,id',
            'grade_id' => 'nullable|exists:grades,id',
            'classroom_id' => 'nullable|exists:classrooms,id',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {
            $createSubject = Subject::create([
                'name'=>$this->name,
                'teacher_id'=>$this->teacher_id,
                'grade_id'=>$this->grade_id,
                'classroom_id'=>$this->classroom_id,
                'description'=>$this->description,
            ]);

            if($createSubject)
            {
                return redirect()->route('subjects.index')->with('success',trans('alert.subject-created'));
            }
        }

        return redirect()->route('subjects.create')->with('error',trans('alert.error'));
    }

}
