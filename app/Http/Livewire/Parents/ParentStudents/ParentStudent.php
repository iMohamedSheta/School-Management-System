<?php

namespace App\Http\Livewire\Parents\ParentStudents;

use Livewire\Component;

class ParentStudent extends Component
{
    public function render()
    {
        $childern = auth()->user()->parent->students()->get();
        return view('livewire.parents.parent-students.parent-student',compact('childern'));
    }
}
