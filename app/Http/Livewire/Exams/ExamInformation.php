<?php

namespace App\Http\Livewire\Exams;

use Livewire\Component;

class ExamInformation extends Component
{
    public $exam;
    public $openModal = false;

    public function openModalToShowInfo()
    {
        $this->openModal = true;
    }

    public function render()
    {
        return view('livewire.exams.exam-information');
    }
}
