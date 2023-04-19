<?php

namespace App\Http\Livewire\Fees;

use Livewire\Component;

class FeeTypeEdit extends Component
{
    public $openModal=false;
    public $feetype;
    public $name;
    public $name_en;
    public $description;

    public function openModalToEdit()
    {
        $this->openModal = true;
    }

    public function mount()
    {
        $this->name = $this->feetype->name;
        $this->name_en = $this->feetype->name_en;
        $this->description = $this->feetype->description;

    }
    public function edit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'name_en' => 'nullable',
            'description' => 'nullable',

        ]);

        if($validatedData)
        {
            $feetypeUpdate = $this->feetype->update([
                'name'=>$this->name,
                'name_en'=>$this->name_en,
                'description'=>$this->description,

            ]);

            if($feetypeUpdate)
            {
                toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);

            }
            else
            {
                toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
            }
            $this->openModal=false;
        }
        else
        {
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }


        $this->emitUp('edited');


    }


    public function render()
    {
        return view('livewire.fees.fee-type-edit');
    }
}
