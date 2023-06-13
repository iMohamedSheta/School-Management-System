<?php

namespace App\Http\Livewire\Subjects\AssociateSubjectClassroom;

use App\Models\Classroom;
use App\Models\ClassroomSubject;
use App\Models\Grade;
use Livewire\Component;

class AssociateSubjectClassroom extends Component
{
    public $subject;
    public $name;
    public $classrooms=[];
    public $grade_id;
    public $classroom_id;
    public $date;

    protected $listeners = ['updatedGradeId'];



    public function mount($subject)
    {
        $this->name = $subject->name;
    }

    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function associateSubjectToClassroom()
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
                $associate_subject_to_classroom = ClassroomSubject::create([
                    'subject_id'=>$this->subject->id,
                    'classroom_id'=>$this->classroom_id,
                ]);

                if($associate_subject_to_classroom)
                {
                    return redirect()->route('subjects.associate.classroom',$this->subject->id)->with('success',trans('alert.associate-subject-to-classroom',['name'=>$this->subject->name,'classroom'=>$classroomName]));
                }
            }
        }catch(\Exception $e)
        {
            return redirect()->route('subjects.associate.classroom',$this->subject->id)->with('error',trans('alert.error'));
        }

        return redirect()->route('subjects.associate.classroom',$this->subject->id)->with('error',trans('alert.error'));
    }




    public function render()
    {
        $grades=Grade::all();
        return view('livewire.subjects.associate-subject-classroom.associate-subject-classroom',compact('grades'));
    }
}
