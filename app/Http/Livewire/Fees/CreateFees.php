<?php

namespace App\Http\Livewire\Fees;

use Livewire\Component;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Currency;
use App\Models\Fee;
use App\Models\Feetype;


class CreateFees extends Component
{
    public $classrooms=[];


    public $title;
    public $amount;
    public $currency_code;
    public $description;
    public $academic_year;
    public $due_date;
    public $grade_id;
    public $classroom_id;
    public $feetype_id;

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
        $feetypes = Feetype::all();
        $currencies = Currency::all();
        return view('livewire.create-fees',compact('grades','currencies','feetypes'));
    }



    public function createFee()
    {
        $validatedData = $this->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'currency_code' => 'required|exists:currencies,code',
            'description' => 'nullable',
            'academic_year' => 'nullable',
            'due_date' => 'nullable|date',
            'feetype_id'=>'required|exists:feetypes,id',
            'grade_id'=>'nullable|exists:grades,id',
            'classroom_id'=>'nullable|exists:classrooms,id|unique:fees,classroom_id',
        ]);

        if($validatedData)
        {
            $feeCreate = Fee::create([
                'title'=>$this->title,
                'amount'=>$this->amount,
                'currency_code'=>$this->currency_code,
                'description'=>$this->description,
                'year'=>$this->academic_year,
                'due_date'=>$this->due_date,
                'feetype_id' => $this->feetype_id,
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
