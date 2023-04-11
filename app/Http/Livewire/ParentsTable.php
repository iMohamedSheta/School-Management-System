<?php

namespace App\Http\Livewire;

use App\Models\MyParent;
use Livewire\Component;
use Livewire\WithPagination;

class ParentsTable extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $parentsQuery = MyParent::query();

        if (!empty($this->search)) {
            $parentsQuery->where(function ($query) {
                $query->where('Name_Father', 'like', '%' . $this->search . '%')
                        ->orWhere('Name_Mother','like','%'. $this->search . '%')
                    ->orWhereHas('user', function  ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('students', function ($query) {
                        $query->whereHas('user',function($query)
                        {
                            $query->where('email', 'like', '%' . $this->search . '%');
                        });
                    });
            });
        }

        $parents = $parentsQuery->paginate(10);
        return view('livewire.parents-table',compact('parents'));
    }

}
