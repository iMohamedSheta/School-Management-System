<?php

namespace App\Http\Livewire\Parents\ParentStudents;

use Livewire\Component;

class ParentStudentAttendance extends Component
{
    public $children;
    public $selectedChild;
    public $showFullAttendance = false;

    public function mount()
    {
        // Retrieve the authenticated parent's children
        $this->children = auth()->user()->parent->students;
    }

    public function render()
    {
        return view('livewire.parents.parent-students.parent-student-attendance');
    }
}
