<?php

namespace App\Http\Livewire\Students;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsTable extends Component
{
    use WithPagination;
    public $search;
    public $classrooms=[];
    public $selectedGrade;
    public $selectedClassroom;
    public $studentIdForDelete;

    protected $listeners = ['updatedGradeId'];


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


    public function render()
    {
        $studentsQuery = Student::query();

        if ($this->selectedGrade && $this->selectedGrade !== 'AllGrades') {
            $studentsQuery->where('grade_id', $this->selectedGrade);
        }

        if ($this->selectedClassroom && $this->selectedClassroom !== 'AllClassrooms') {
            $studentsQuery->where('classroom_id', $this->selectedClassroom);
        }

        if ($this->search) {
            $studentsQuery->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%');
                    });
            });
        }

        $students = $studentsQuery->paginate(10);



        $grades = Grade::all();
        return view('livewire.students-table',compact('grades','students'));
    }

}
