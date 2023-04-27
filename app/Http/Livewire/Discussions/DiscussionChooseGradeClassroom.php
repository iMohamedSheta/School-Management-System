<?php

namespace App\Http\Livewire\Discussions;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Grade;

class DiscussionChooseGradeClassroom extends Component
{
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
    public function render()
    {
        $grades = Grade::all();
        return view('livewire.discussions.discussion-choose-grade-classroom',compact('grades'));
    }
}
