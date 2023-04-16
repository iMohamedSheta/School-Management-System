<?php

namespace App\Http\Livewire\Fees;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Fee;
use Livewire\WithPagination;


class ClassroomsFeesTable extends Component
{
    use WithPagination;
    public $search;
    public $classrooms=[];
    public $selectedGrade;
    public $selectedClassroom;

    protected $listeners = ['updatedGradeId'];


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function render()
    {

        $feesQuery = Fee::query();

        if ($this->selectedGrade && $this->selectedGrade !== 'AllGrades') {
            $feesQuery->where('grade_id', $this->selectedGrade);
        }

        if ($this->selectedClassroom && $this->selectedClassroom !== 'AllClassrooms') {
            $feesQuery->where('classroom_id', $this->selectedClassroom);
        }

        if ($this->search) {
            $feesQuery->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('year', 'like', '%' . $this->search . '%');
            });
        }

        $fees = $feesQuery->paginate(10);
        $grades = Grade::all();


        return view('livewire.classrooms-fees-table',compact('fees','grades'));
    }
}
