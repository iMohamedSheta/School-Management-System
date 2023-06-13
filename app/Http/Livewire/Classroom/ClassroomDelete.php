<?php

namespace App\Http\Livewire\Classroom;

use Livewire\Component;

class ClassroomDelete extends Component
{
    public $classroom;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $classroom = $this->classroom->name;
        $this->classroom->delete();
        $this->emitUp('deleted');
        $this->reset();

        return redirect()->route('classrooms.index')->with('success', trans('alert.delete_classroom_success',['name'=>$classroom]));
    }

    public function render()
    {
        return view('livewire.classroom.classroom-delete');
    }
}
