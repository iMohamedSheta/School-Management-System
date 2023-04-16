<?php

namespace App\Http\Livewire\Fees;

use Livewire\Component;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Fee;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;


class CreateFees extends Component
{
    use WithPagination;
    public $search;
    public $classrooms=[];
    public $selectedGrade;
    public $selectedClassroom;

    public $title;
    public $amount;
    public $description;
    public $academic_year;
    public $due_date;
    public $grade_id;
    public $classroom_id;

    protected $listeners = ['updatedGradeId'];


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function render()
    {
        $grades = Grade::all();
        return view('livewire.create-fees',compact('grades'));
    }



    public function createFee()
    {
        $validatedData = $this->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'nullable',
            'academic_year' => 'nullable|date_format:Y-Y',
            'due_date' => 'nullable|date',
            'grade_id'=>'required|exists:grades,id',
            'classroom_id'=>'required|exists:classrooms,id',
        ]);

        if($validatedData)
        {
            $feeCreate = Fee::create([
                'title'=>$this->title,
                'amount'=>$this->amount,
                'description'=>$this->description,
                'year'=>$this->academic_year,
                'due_date'=>$this->due_date,
                'grade_id' => $this->grade_id,
                'classroom_id' => $this->classroom_id,
            ]);
        }

        if($feeCreate)
        {
            return redirect()->route('fees.index')->with('success',trans('alert.fee_created'));
        }

        return redirect()->route('fee.create')->with('error',trans('alert.error'));


    }
}
