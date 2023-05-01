<?php

namespace App\Http\Livewire\Fees\Receipts;

use App\Models\Currency;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateReceipt extends Component
{
    public $student;
    public $title;
    public $debit;
    public $description;
    public $currency_code;

    public function render()
    {
        $currencies = Currency::all();
        return view('livewire.fees.receipts.create-receipt',compact('currencies'));
    }


    public function createReceipt()
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
            try {
            $receiptCreate = ReceiptStudent::create([
                'student_id'=>$this->student->id,
                'title'=>$this->title,
                'debit'=>$this->debit,
                'currency_code'=>$this->currency_code,
                'description'=>$this->description,
                'date'=>date('Y-m-d'),
            ]);
            if($receiptCreate)
            {
                $FundAccountCreate = FundAccount::create([
                    'date'=>date('Y-m-d'),
                    'receipt_id'=>$receiptCreate->id,
                    'debit'=>$receiptCreate->debit,
                    'credit'=>0.00,
                    'currency_code'=>$receiptCreate->currency_code,
                    'description'=>$receiptCreate->description,
                ]);
            }
            if($FundAccountCreate)
            {
                StudentAccount::create([
                    'student_id'=>$this->student->id,
                    'receipt_id'=>$receiptCreate->id,
                    'currency_code'=>$receiptCreate->currency_code,
                    'debit'=>0.00,
                    'credit'=>$receiptCreate->debit,
                    'description'=>$receiptCreate->description,
                    'type'=>"receipt",
                ]);
            }

            DB::commit();

            return redirect()->route('receipt.create',$this->student->id)->with('success',trans('alert.student-receipt-created',['name'=>$this->student->name]));

        }
        catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }
}

}
