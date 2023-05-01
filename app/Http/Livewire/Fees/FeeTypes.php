<?php

namespace App\Http\Livewire\Fees;

use App\Models\Feetype;
use Livewire\Component;
use Livewire\WithPagination;

class FeeTypes extends Component
{

    use WithPagination;
    public $name;
    public $name_en;
    public $description;
    public $search;




public $listeners = ['deleted'=>'$refresh','edited'=>'$refresh'];


    public function render()
    {
        $feetypesQuery =Feetype::query();
        if (!empty($this->search)) {
            $feetypesQuery->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('name_en', 'like', '%' . $this->search . '%');
            });
        }
        $feetypes = $feetypesQuery->paginate(10);

        return view('livewire.fee-types',compact('feetypes'));
    }







    public function createFeeType()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'name_en' => 'nullable',
        ]);

        if($validatedData)
        {
            $feetypCreate = Feetype::create([
                'name'=>$this->name,
                'description'=>$this->description,
                'name_en'=>$this->name_en,
            ]);
        }

        if($feetypCreate)
        {
            $this->name= null;
            $this->name_en= null;
            $this->description= null;
            toastr()->success(trans('alert.create-success'), trans('alert.success'), ['timeOut' => 3000]);

        }

    }


}
