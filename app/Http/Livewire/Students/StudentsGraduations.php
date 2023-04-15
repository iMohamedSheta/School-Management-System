<?php

namespace App\Http\Livewire\Students;

use App\Models\Classroom;
use App\Models\Grade;
use Livewire\Component;

class StudentsGraduations extends Component
{
    public $grades;
    public $classrooms=[];
    public $grade_id;
    public $classroom_id;



    protected $listeners = ['updatedGradeId'];

    public function mount()
    {
        $this->grades = Grade::all();
    }


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
        return view('livewire.students-graduations');
    }
}
