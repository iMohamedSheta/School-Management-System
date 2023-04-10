<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TeacherInformation extends Component
{
    public $teacher;

    public function mount($teacher)
    {
        $this->teacher = $teacher;
    }
    public function render()
    {
        return view('livewire.teacher-information');
    }

    public function print()
    {
        $this->dispatchBrowserEvent('print');
    }
}
