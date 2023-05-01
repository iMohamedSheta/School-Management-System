<?php

namespace App\Http\Livewire\Fees\FeesInvoices;

use App\Models\Classroom;
use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\Feetype;
use App\Models\StudentAccount;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateFeeInvoice extends Component
{
    public $student;
    public $name;
    public $feetype_id;
    public $fee_id;
    public $amount;
    public $currency_code;
    public $description;
    public $fees=[];
    protected $listeners = ['updatedFeeTypeId','updatedFeeId'];


    public function mount($student)
    {
        $this->name = $student->name;
    }

    public function updatedFeeTypeId($value)
    {
        if ($value) {
            $this->fees = Fee::where('feetype_id', $value)->get();
        } else {
            $this->fees = [];
        }
    }

    public function updatedFeeId($value)
    {
        if ($value) {
            $selectedFee = Fee::findOrFail($value);
            $this->amount = $selectedFee->amount;
            $this->currency_code = $selectedFee->currency->name;
        } else {
            $this->amount = null;
            $this->currency_code = null;
        }
    }

    public function createFeeInvoice()
    {
        $validatedData = $this->validate([
            'name'=>'string|nullable',
            'amount' => 'required|numeric',
            'currency_code' => 'required|exists:currencies,name',
            'fee_id'=>'required|exists:fees,id',
            'feetype_id'=>'required|exists:feetypes,id',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {

            $fee=Fee::findOrFail($this->fee_id);

            DB::beginTransaction();
            try {
            $feeInvoiceCreate = FeeInvoice::create([
                'student_id'=>$this->student->id,
                'amount'=>$fee->amount,
                'currency_code'=>$fee->currency_code,
                'description'=>$this->description,
                'invoice_date'=>date('Y-m-d'),
                'feetype_id' => $fee->feetype_id,
                'fee_id' => $this->fee_id,
                'grade_id' => $this->student->grade_id,
                'classroom_id' => $this->student->classroom_id,
            ]);
            if($feeInvoiceCreate)
            {
                StudentAccount::create([
                    'student_id'=>$this->student->id,
                    'fee_invoice_id' => $feeInvoiceCreate->id,
                    'currency_code'=>$feeInvoiceCreate->currency_code,
                    'debit'=>$this->amount,
                    'credit'=>0.00,
                    'description'=>$this->description,
                    'type'=>"invoice",
                ]);
            }

            DB::commit();

            return redirect()->route('feeinvoice.create',$this->student->id)->with('success',trans('alert.student-feeinvoice-created',['name'=>$this->student->name]));

        }

        catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }
    }



    public function render()
    {
        $feetypes = Feetype::all();
        return view('livewire.fees.fees-invoices.create-fee-invoice',compact('feetypes'));
    }
}
