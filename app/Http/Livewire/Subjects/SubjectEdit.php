<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Livewire\Component;

class SubjectEdit extends Component
{
    public $openModal = false;
    public $subject;
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

    public function openModalToEdit()
    {
        $this->openModal = true;
    }

    public function mount($subject)
    {
        $this->name = $subject->name;
        $this->grade_id = $subject->grade_id;
        $this->classroom_id = $subject->classroom_id;
        $this->teacher_id = $subject->teacher_id;
        $this->description = $subject->description;
        $this->classrooms = $subject->grade->classrooms;

    }

    public function updateSubject()
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
            $updateSubject = $this->subject->update([
                'name'=>$this->name,
                'teacher_id'=>$this->teacher_id,
                'grade_id'=>$this->grade_id,
                'classroom_id'=>$this->classroom_id,
                'description'=>$this->description,
            ]);

            if($updateSubject)
            {
                toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);
                $this->emitUp('edited');
                $this->openModal=false;
            }
            else
            {
                toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
            }
        }else
        {
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }

    public function render()
    {
        $grades=Grade::all();
        $teachers=Teacher::all();
        return view('livewire.subjects.subject-edit',compact('grades','teachers'));
    }
}
