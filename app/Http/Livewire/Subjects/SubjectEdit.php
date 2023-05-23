<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Livewire\Component;

class SubjectEdit extends Component
{
    public $openModal = false;
    public $subject;
    public $name;
    public $description;
    public $teacher_id;




    public function openModalToEdit()
    {
        $this->openModal = true;
    }

    public function mount($subject)
    {
        $this->name = $subject->name;
        $this->teacher_id = $subject->teacher_id;
        $this->description = $subject->description;

    }

    public function updateSubject()
    {
        $validatedData = $this->validate([
            'name'=>'string|required',
            'teacher_id' => 'nullable|exists:teachers,id',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {
            $updateSubject = $this->subject->update([
                'name'=>$this->name,
                'teacher_id'=>$this->teacher_id,
                'description'=>$this->description,
            ]);

            if($updateSubject)
            {
                toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);
                $this->emitUp('edited');
                $this->openModal=false;
            }
            else
            {
                toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
            }
        }else
        {
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }

    public function render()
    {
        $teachers=Teacher::all();
        return view('livewire.subjects.subject-edit',compact('teachers'));
    }
}
