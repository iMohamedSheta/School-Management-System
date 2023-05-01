<?php

namespace App\Http\Livewire\Fees\ProcessingFees;

use Livewire\Component;

class ProcessingFeeInformation extends Component
{
    public $processingfee;
    public $openModal = false;
    Public $student_current_debit;
    Public $amount_;


    public function openModalToShowInfo()
    {
        $this->openModal = true;
    }


    public function mount($processingfee)
    {
        $this->processingfee = $processingfee;
        $this->amount_=$processingfee->amount_;
        $this->student_current_debit=$processingfee->student_current_debit;
    }

    public function render()
    {
        return view('livewire.fees.processing-fees.processing-fee-information');
    }
}
