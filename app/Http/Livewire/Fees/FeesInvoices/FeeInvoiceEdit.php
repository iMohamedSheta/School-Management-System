<?php

namespace App\Http\Livewire\Fees\FeesInvoices;

use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Feetype;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FeeInvoiceEdit extends Component
{
    public $feeinvoice;

    public $openModal=false;
    public $name;
    public $feetype_id;
    public $fee_id;
    public $amount;
    public $currency_code;
    public $description;
    public $fees=[];

    protected $listeners = ['updatedFeeTypeId','updatedFeeId'];


    public function openModalToEdit()
    {
        $this->openModal = true;
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


    public function mount($feeinvoice)
    {
        $this->feeinvoice = $feeinvoice;
        $this->name = $feeinvoice->student->name;
        $this->amount = $feeinvoice->amount;
        $this->currency_code = $feeinvoice->currency_code;
        $this->description = $feeinvoice->description;
        $this->feetype_id = $feeinvoice->feetype_id;
        $this->fees = Fee::where('feetype_id', $this->feetype_id)->get();
        $this->fee_id = $feeinvoice->fee_id;

    }


    public function updateFeeInvoice()
    {
        $validatedData = $this->validate([
            'name'=>'string|nullable',
            'amount' => 'required|numeric',
            'currency_code' => 'required|exists:currencies,name',
            'fee_id'=>'required|exists:feetypes,id',
            'feetype_id'=>'required|exists:feetypes,id',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {

            $fee=Fee::findOrFail($this->fee_id);
            $feetypeId = $fee->feetype_id;

            DB::beginTransaction();
            try {
            $feeInvoiceUpdate = $this->feeinvoice->update([
                'amount'=>$fee->amount,
                'currency_code'=>$fee->currency_code,
                'description'=>$this->description,
                'invoice_date'=>date('Y-m-d'),
                'feetype_id' => $feetypeId,
                'fee_id' => $this->fee_id,
            ]);
            if($feeInvoiceUpdate)
            {
                $StudentAccount = StudentAccount::where('fee_invoice_id',$this->feeinvoice->id)->first();
                $StudentAccount->update([
                    'debit'=>$this->amount,
                    'credit'=>0.00,
                    'description'=>$this->description,
                ]);
            }


            DB::commit();

            toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);

        }

        catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }

        $this->emitUp('edited');
        $this->openModal=false;


    }

}
    public function render()
    {
        $feetypes=Feetype::all();
        return view('livewire.fees.fees-invoices.fee-invoice-edit',compact('feetypes'));
    }
}
