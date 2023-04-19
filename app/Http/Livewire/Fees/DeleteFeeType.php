<?php

namespace App\Http\Livewire\Fees;

use Livewire\Component;

class DeleteFeeType extends Component
{

    public $feetype;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->feetype->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);


    }





    public function render()
    {
        return view('livewire.fees.delete-fee-type');
    }
}
