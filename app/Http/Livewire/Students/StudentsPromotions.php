<?php

namespace App\Http\Livewire\Students;

use App\Models\Classroom;
use App\Models\Grade;
use Livewire\Component;

class StudentsPromotions extends Component
{
    public $grades;
    public $classrooms_from=[];
    public $classrooms_to=[];
    public $from_grade;
    public $to_grade;
    public $from_classroom;
    public $to_classroom;



    protected $listeners = ['updatedFromGradeId','updatedToGradeId'];

    public function mount()
    {
        $this->grades = Grade::all();
    }

    public function render()
    {
        return view('livewire.students-promotions');
    }

    public function updatedToGradeId($value)
    {
        if ($value) {
            $this->classrooms_to = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms_to = [];
        }
    }


    public function updatedFromGradeId($value)
    {
        if ($value) {
            $this->classrooms_from = Classroom::where('grade_id', $value)->get();
        }
        else {
            $this->classrooms_from = [];
        }
    }





}
