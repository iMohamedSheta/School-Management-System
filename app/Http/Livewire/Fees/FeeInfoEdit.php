<?php

namespace App\Http\Livewire\Fees;

use App\Models\Classroom;
use App\Models\Currency;
use App\Models\Fee;
use App\Models\Grade;
use Livewire\Component;

class FeeInfoEdit extends Component
{
    public $fee;

    public $classrooms=[];
    public $title;
    public $amount;
    public $currency_code;
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

    public function mount($fee)
    {
        $this->fee = $fee;
        $this->title = $fee->title;
        $this->amount = $fee->amount;
        $this->currency_code = $fee->currency_code;
        $this->description = $fee->description;
        $this->academic_year = $fee->academic_year;
        $this->due_date = $fee->due_date;
        $this->grade_id = $fee->grade_id;
        $this->classroom_id = $fee->classroom_id;
        $this->classrooms =  $fee->grade->classrooms;

    }


    public function render()
    {
        $grades=Grade::all();
        $currencies=Currency::all();

        return view('livewire.fee-info-edit',compact('grades','currencies'));
    }



    public function updateFee()
    {
        $validatedData = $this->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'currency_code' => 'required|exists:currencies,code',
            'description' => 'nullable',
            'academic_year' => 'nullable',
            'due_date' => 'nullable|date',
            'grade_id'=>'required|exists:grades,id',
            'classroom_id'=>'required|exists:classrooms,id|unique:fees,classroom_id,'.$this->fee->id.',id',
        ]);

        if($validatedData)
        {
            $feeUpdate = $this->fee->update([
                'title'=>$this->title,
                'amount'=>$this->amount,
                'currency_code'=>$this->currency_code,
                'description'=>$this->description,
                'year'=>$this->academic_year,
                'due_date'=>$this->due_date,
                'grade_id' => $this->grade_id,
                'classroom_id' => $this->classroom_id,
            ]);
        }

        if($feeUpdate)
        {
            return redirect()->route('fee.info',$this->fee->id)->with('success',trans('alert.fee_updated',['name'=>$this->fee->classroom->name]));
        }

        return redirect()->route('fee.create')->with('error',trans('alert.error'));


    }
}
