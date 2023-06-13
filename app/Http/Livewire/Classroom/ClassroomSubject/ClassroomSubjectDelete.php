<?php

namespace App\Http\Livewire\Classroom\ClassroomSubject;

use App\Models\ClassroomSubject;
use Livewire\Component;

class ClassroomSubjectDelete extends Component
{
    public $classroom_subject;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        try
        {
            $subjectname= $this->classroom_subject->name;
            $this->classroom_subject->delete();
        }
        catch(\Exception $e)
        {
            toastr()->error(trans('alert.error'), trans('alert.error'), ['timeOut' => 3000]);
        }

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.classroom-subject-removed',['subject'=>$subjectname]), trans('alert.success'), ['timeOut' => 3000]);

    }
    public function render()
    {
        return view('livewire.classroom.classroom-subject.classroom-subject-delete');
    }
}
