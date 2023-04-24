<?php

namespace App\Http\Livewire\Fees\Receipts;

use App\Models\FundAccount;
use App\Models\StudentAccount;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReceiptEdit extends Component
{
    public $openModal=false;
    public $receipt;
    public $title;
    public $debit;
    public $description;
    public $currency_code;



    public function mount($receipt)
    {
        $this->receipt=$receipt;
        $this->title=$receipt->title;
        $this->debit=$receipt->debit;
        $this->currency_code=$receipt->currency_code;
        $this->description=$receipt->description;
    }

    public function openModalToEdit()
    {
        $this->openModal = true;
    }


    public function editReceipt()
    {
        $validatedData = $this->validate([
            'title'=>'string|required',
            'debit' => 'required|numeric',
            'currency_code' => 'required|exists:currencies,code',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {

            DB::beginTransaction();
            $receiptUpdate = $this->receipt->update([
                'title'=>$this->title,
                'debit'=>$this->debit,
                'currency_code'=>$this->currency_code,
                'description'=>$this->description,
            ]);
            if($receiptUpdate)
            {
                $receiptId=$this->receipt->id;

                $fundAccount=FundAccount::where('receipt_id',$receiptId)->first();
                $FundAccountUpdate = $fundAccount->update([
                    'debit'=>$this->debit,
                    'credit'=>0.00,
                    'currency_code'=>$this->currency_code,
                    'description'=>$this->description,
                ]);
            }
            if($FundAccountUpdate)
            {
                $studentAccount=StudentAccount::where('receipt_id',$receiptId)->first();

                $studentAccount->update([
                    'currency_code'=>$this->currency_code,
                    'debit'=>0.00,
                    'credit'=>$this->debit,
                    'description'=>$this->description,
                ]);
            }

            DB::commit();

            toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);

            $this->emitUp('edited');
            $this->openModal=false;


    }


    }
    public function render()
    {
        $currencies=Currency::all();
        return view('livewire.fees.receipts.receipt-edit',compact('currencies'));
    }
}
