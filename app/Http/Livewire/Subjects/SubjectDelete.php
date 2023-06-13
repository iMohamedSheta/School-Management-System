<?php

namespace App\Http\Livewire\Subjects;

use Livewire\Component;

class SubjectDelete extends Component
{
    public $subject;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->subject->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);

    }

    public function render()
    {
        return view('livewire.subjects.subject-delete');
    }
}
