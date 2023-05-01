<?php

namespace App\Http\Livewire\Fees\FeesInvoices;

use Livewire\Component;

class FeeInvoiceDelete extends Component
{
    public $feeinvoice;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->feeinvoice->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);

    }


    public function render()
    {
        return view('livewire.fees.fees-invoices.fee-invoice-delete');
    }
}
