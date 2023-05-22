<?php

namespace App\Http\Livewire\Teachers\TeacherClassrooms;

use Livewire\Component;
use App\Models\TeacherClassroom;
use Livewire\WithPagination;

class TeacherClassrooms extends Component
{
    use WithPagination;

    public $search;
    public $teacherClassroomIdForDelete;
    protected $listeners=['deleted'=>'$refresh'];





    public function render()
    {
        $teachersQuery = TeacherClassroom::query();

        if (!empty($this->search)) {
            $teachersQuery->where(function ($query) {
                $query->whereHas('teacher', function ($query) {
                        $query->where('teacher_name', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($query) {
                            $query->where('email', 'like', '%' . $this->search . '%');
                        });
                    });
            });
        }


        $teacherclassrooms = $teachersQuery->paginate(10);


        return view('livewire.teachers.teacher-classrooms.teacher-classrooms',compact('teacherclassrooms'));
    }
}
