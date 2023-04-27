<?php

namespace App\Http\Livewire\Fees\ProcessingFees;

use Livewire\Component;

class ProcessingFeeDelete extends Component
{
    public $processingfee;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->processingfee->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);

    }
    public function render()
    {
        return view('livewire.fees.processing-fees.processing-fee-delete');
    }
}
