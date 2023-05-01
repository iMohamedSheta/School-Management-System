<?php

namespace App\Http\Livewire\Fees\PaymentStudent;

use Livewire\Component;

class PaymentDelete extends Component
{
    public $payment;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->payment->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);

    }


    public function render()
    {
        return view('livewire.fees.payment-student.payment-delete');
    }
}
