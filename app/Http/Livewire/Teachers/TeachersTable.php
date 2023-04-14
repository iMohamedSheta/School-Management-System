<?php

namespace App\Http\Livewire\Teachers;

use App\Models\Grade;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;


class TeachersTable extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $teachersQuery = Teacher::query();

        if (!empty($this->search)) {
            $teachersQuery->where(function ($query) {
                $query->where('teacher_name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%');
                    });
            });
        }


        $teachers = $teachersQuery->paginate(10);


        return view('livewire.teachers-table',compact('teachers'));
    }
}
