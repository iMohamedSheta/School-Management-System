<?php

namespace App\Http\Livewire\Parents;

use Livewire\Component;

class ParentInformation extends Component
{
    public $parent;

    public function mount($parent)
    {
        $this->parent = $parent;
    }
    public function render()
    {
        return view('livewire.parent-information');
    }
    public function print()
    {
        $this->dispatchBrowserEvent('print');
    }
}
