<?php

namespace App\Http\Livewire\OnlineMeeting;

use App\Models\Classroom;
use App\Models\Grade;
use Livewire\Component;



class CreateMeeting extends Component
{
    public $classrooms=[];
    public $grade_id;
    public $classroom_id;
    public $topic;
    public $duration;
    public $start_at;
    public $description;

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

        return view('livewire.online-meeting.create-meeting',compact('grades'));
    }













}

