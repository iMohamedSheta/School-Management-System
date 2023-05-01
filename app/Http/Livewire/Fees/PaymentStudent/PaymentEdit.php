<?php

namespace App\Http\Livewire\Fees\PaymentStudent;

use App\Models\Currency;
use App\Models\FundAccount;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentEdit extends Component
{
    public $openModal=false;
    public $payment;
    public $title;
    public $amount;
    public $description;
    public $currency_code;



    public function mount($payment)
    {
        $this->payment=$payment;
        $this->title=$payment->title;
        $this->amount=$payment->amount;
        $this->currency_code=$payment->currency_code;
        $this->description=$payment->description;
    }

    public function openModalToEdit()
    {
        $this->openModal = true;
    }


    public function editPayment()
    {
        $validatedData = $this->validate([
            'title'=>'string|required',
            'amount' => 'required|numeric',
            'currency_code' => 'required|exists:currencies,code',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {

            DB::beginTransaction();
            try
            {
                $paymentUpdate = $this->payment->update([
                    'title'=>$this->title,
                    'amount'=>$this->amount,
                    'currency_code'=>$this->currency_code,
                    'description'=>$this->description,
                ]);

                if($paymentUpdate)
                {
                    $paymentId=$this->payment->id;
                    $fundAccount=FundAccount::where('payment_id',$paymentId)->first();
                    $FundAccountUpdate = $fundAccount->update([
                        'credit'=>$this->amount,
                        'currency_code'=>$this->currency_code,
                        'description'=>$this->description,
                    ]);
                }

                if($FundAccountUpdate)
                {
                    $studentAccount=StudentAccount::where('payment_id',$paymentId)->first();
                    $studentAccount->update([
                        'currency_code'=>$this->currency_code,
                        'debit'=>$this->amount,
                        'description'=>$this->description,
                    ]);
                }
                DB::commit();

                toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);

                $this->emitUp('edited');
                $this->openModal=false;

            }
            catch (\Exception $e)
            {
                DB::rollback();
                toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
            }

        }
    }


    public function render()
    {
        $currencies=Currency::all();
        return view('livewire.fees.payment-student.payment-edit',compact('currencies'));
    }
}
