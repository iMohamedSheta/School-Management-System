<?php

namespace App\Http\Livewire\Exams;

use Livewire\Component;

class ExamDelete extends Component
{
    public $exam;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->exam->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);

    }

    public function render()
    {
        return view('livewire.exams.exam-delete');
    }
}
