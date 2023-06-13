<?php

namespace App\Http\Livewire\Teachers\TeacherClassrooms;

use App\Models\Classroom;
use Livewire\Component;
use App\Models\Grade;
use App\Models\TeacherClassroom;

class AssignTeacherClassrooms extends Component
{
    public $teacher;
    public $name;
    public $classrooms=[];
    public $grade_id;
    public $classroom_id;

    protected $listeners = ['updatedGradeId'];


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function storeTeacerClassroom()
    {
        $validatedData = $this->validate([
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $classroomName=Classroom::findOrFail($this->classroom_id)->name;
        try
        {
            if($validatedData)
            {
                $assignTeacherClassroom = TeacherClassroom::create([
                    'teacher_id'=>$this->teacher->id,
                    'classroom_id'=>$this->classroom_id,
                ]);

                if($assignTeacherClassroom)
                {
                    return redirect()->route('teacher.assign.classroom',$this->teacher->id)->with('success',trans('alert.assign-classroom-success',['name'=>$this->name,'classroom'=>$classroomName]));
                }
            }
        }catch(\Exception $e)
        {
            return redirect()->route('teacher.assign.classroom',$this->teacher->id)->with('error',trans('alert.error'));
        }

        return redirect()->route('teacher.assign.classroom',$this->teacher->id)->with('error',trans('alert.error'));
    }


    public function mount($teacher)
    {
        $this->name= $teacher->teacher_name;
    }


    public function render()
    {
        $grades = Grade::all();
        return view('livewire.teachers.teacher-classrooms.assign-teacher-classrooms',compact('grades'));
    }
}
