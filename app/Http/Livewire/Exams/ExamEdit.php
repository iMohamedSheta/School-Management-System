<?php

namespace App\Http\Livewire\Exams;

use Livewire\Component;
use App\Models\Subject;

class ExamEdit extends Component
{
    public $openModal = false;
    public $exam;
    public $name;
    public $subject_id;
    public $term;
    public $academic_year;
    public $description;

    public function mount($exam)
    {
        $this->name=$exam->name;
        $this->subject_id=$exam->subject_id;
        $this->term=$exam->term;
        $this->academic_year=$exam->academic_year;
        $this->description=$exam->description;
    }

    public function openModalToEdit()
    {
        $this->openModal = true;
    }

    public function render()
    {
        $subjects=Subject::all();

        return view('livewire.exams.exam-edit',compact('subjects'));
    }


    public function updateExam()
    {
        $validatedData = $this->validate([
            'name'=>'string|required',
            'subject_id' => 'nullable|exists:subjects,id',
            'term' => 'nullable|numeric',
            'academic_year' => 'nullable',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {
            $updateExam =$this->exam->update([
                'name'=>$this->name,
                'subject_id'=>$this->subject_id,
                'term'=>$this->term,
                'academic_year'=>$this->academic_year,
                'description'=>$this->description,
            ]);

            if($updateExam)
            {
                toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);
                $this->emitUp('edited');
                $this->openModal=false;
            }
            else {toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);}
        }
        else {toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);}
    }

}
