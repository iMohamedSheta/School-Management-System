<?php

namespace App\Http\Livewire\Fees\ProcessingFees;

use App\Models\Currency as ModelsCurrency;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProcessingFeeEdit extends Component
{
    public $openModal=false;
    public $processingfee;
    public $title;
    public $amount;
    public $description;
    public $currency_code;
    public $student_current_debit;



    public function mount($processingfee)
    {
        $this->processingfee=$processingfee;
        $this->title=$processingfee->title;
        $this->amount=$processingfee->amount;
        $this->student_current_debit=$processingfee->student_current_debit;
        $this->currency_code=$processingfee->currency_code;
        $this->description=$processingfee->description;
    }

    public function openModalToEdit()
    {
        $this->openModal = true;
    }

    public function render()
    {

        $currencies=ModelsCurrency::all();
        return view('livewire.fees.processing-fees.processing-fee-edit',compact('currencies'));
    }


    public function updateProcessingFee()
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
            try {
            $updateProcessingFee = $this->processingfee->update([
                'title'=>$this->title,
                'amount'=>$this->amount,
                'currency_code'=>$this->currency_code,
                'description'=>$this->description,
            ]);


            if($updateProcessingFee)
            {
                $updateStudentAccount=StudentAccount::where('processing_id',$this->processingfee->id)->first();
                $updateStudentAccount->update([
                    'currency_code'=>$this->currency_code,
                    'credit'=>$this->amount,
                    'description'=>$this->description,
                ]);
            }

            DB::commit();

            return redirect()->route('processingfees.index')->with('success',trans('alert.student-processingfee-updated',['name'=>$this->processingfee->student->name]));

        }
        catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }
    }
}
