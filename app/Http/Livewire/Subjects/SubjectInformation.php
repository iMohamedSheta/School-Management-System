<?php

namespace App\Http\Livewire\Subjects;

use Livewire\Component;

class SubjectInformation extends Component
{
    public $subject;
    public $openModal = false;

    public function openModalToShowInfo()
    {
        $this->openModal = true;
    }


    public function render()
    {
        return view('livewire.subjects.subject-information');
    }
}
