<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Teacher;
use Livewire\Component;

class TeachersTable extends Component
{
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

        $grades = Grade::all();

        return view('livewire.teachers-table',compact('grades','teachers'));
    }
}
