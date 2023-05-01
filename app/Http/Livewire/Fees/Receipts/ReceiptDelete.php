<?php

namespace App\Http\Livewire\Fees\Receipts;

use Livewire\Component;

class ReceiptDelete extends Component
{
    public $receipt;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->receipt->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);

    }

    public function render()
    {
        return view('livewire.fees.receipts.receipt-delete');
    }
}
