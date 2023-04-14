<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;

class StudentInformation extends Component
{

    public $student;

    public function mount($student)
    {
        $this->student = $student;
    }
    public function render()
    {
        return view('livewire.student-information');
    }

    public function print()
    {
        $this->dispatchBrowserEvent('print');
    }

}
