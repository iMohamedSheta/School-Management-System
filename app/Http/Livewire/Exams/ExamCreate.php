<?php

namespace App\Http\Livewire\Exams;

use App\Models\Exam;
use App\Models\Subject;
use Livewire\Component;

class ExamCreate extends Component
{
    public $name;
    public $subject_id;
    public $term;
    public $academic_year;
    public $description;


    public function render()
    {
        $subjects=Subject::all();
        return view('livewire.exams.exam-create',compact('subjects'));
    }

    public function createExam()
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
            $createSubject = Exam::create([
                'name'=>$this->name,
                'subject_id'=>$this->subject_id,
                'term'=>$this->term,
                'academic_year'=>$this->academic_year,
                'description'=>$this->description,
            ]);

            if($createSubject)
            {
                return redirect()->route('exams.index')->with('success',trans('alert.exam-created'));
            }
        }

        return redirect()->route('exams.create')->with('error',trans('alert.error'));
    }
}
