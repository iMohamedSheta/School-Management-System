<?php

namespace App\Http\Livewire\Classroom\ClassroomSubject;

use Livewire\Component;
use Livewire\WithPagination;

class ClassroomSubjectTable extends Component
{
    use WithPagination;
    public $classroom;
    protected $listeners=['deleted'=>'$refresh'];

    public function render()
    {
        $classroom_subjects= $this->classroom->subjects()->paginate();
        return view('livewire.classroom.classroom-subject.classroom-subject-table',compact('classroom_subjects'));
    }
}
