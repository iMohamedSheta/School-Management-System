<?php

namespace App\Http\Livewire\Students;

use App\Models\Classroom;
use App\Models\Promotions;
use App\Models\Grade;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsPromotionsTable extends Component
{
    use WithPagination;


    protected $listeners = ['updatedGradeId'];
    public $grades;
    public $search;
    public $classrooms=[];
    public $selectedGrade;
    public $selectedClassroom;

    public function mount()
    {
        $this->grades = Grade::all();
    }

    public function render()
    {


        $promotionQuery = Promotions::query();

        if ($this->selectedGrade && $this->selectedGrade !== 'AllGrades') {
            $promotionQuery->where('to_grade', $this->selectedGrade);
        }

        if ($this->selectedClassroom && $this->selectedClassroom !== 'AllClassrooms') {
            $promotionQuery->where('to_classroom', $this->selectedClassroom);
        }

        if ($this->search) {
            $promotionQuery->where(function ($query) {
                $query->orWhereHas('student', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere(function($query)
                    {
                        $query->orWhereHas('user',function($query)
                        {
                            $query->where('email','like','%'.$this->search .'%');
                        });
                    });
                    });
            });
        }

        $promotions = $promotionQuery->paginate(10);


        return view('livewire.students-promotions-table',compact('promotions'));
    }


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function filterByGrade($gradeId)
    {
        $this->selectedGrade = $gradeId;
        $this->selectedClassroom = null;
    }

    public function filterByClassroom($classroomId)
    {
        $this->selectedClassroom = $classroomId;
    }
}
