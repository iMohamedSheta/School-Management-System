<?php

namespace App\Http\Livewire\Fees;

use Livewire\Component;

class FeeTypeInfo extends Component
{
    public $feetype;
    public $openModal = false;

    public function openModalToShowInfo()
    {
        $this->openModal = true;
    }

    public function render()
    {
        return view('livewire.fees.fee-type-info');
    }
}
