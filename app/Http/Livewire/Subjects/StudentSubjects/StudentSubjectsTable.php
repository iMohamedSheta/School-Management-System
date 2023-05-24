<?php

namespace App\Http\Livewire\Subjects\StudentSubjects;

use Livewire\Component;
use Livewire\WithPagination;

class StudentSubjectsTable extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
            $student= auth()->user()->student;
            $student_subjects=$student->subjects();

            if ($this->search) {
                $student_subjects = $student_subjects->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            }

            $student_subjects = $student_subjects->paginate(10);

        return view('livewire.subjects.student-subjects.student-subjects-table',compact('student_subjects'));
    }
}
