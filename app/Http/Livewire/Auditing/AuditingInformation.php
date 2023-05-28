<?php

namespace App\Http\Livewire\Auditing;

use Livewire\Component;

class AuditingInformation extends Component
{
    public $audit;
    public $openModal = false;

    public function openModalToShowInfo()
    {
        $this->openModal = true;
    }

    public function render()
    {
        return view('livewire.auditing.auditing-information');
    }
}
