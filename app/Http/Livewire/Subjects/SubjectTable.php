<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectTable extends Component
{
    use WithPagination;
    public $search;

    public $listeners = ['deleted'=>'$refresh','edited'=>'$refresh'];


    public function render()
    {

        $subjectQuery = Subject::query();

        if ($this->search) {
            $subjectQuery->where(function ($query) {

                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description','like','%'.$this->search.'%')

                ->orWhereHas('teacher', function ($query)
                {
                    $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%');
                    });
                })

                ->orWhereHas('classroom', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })

                ->orWhereHas('grade', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            });
        }


        $subjects= $subjectQuery->paginate(10);

        return view('livewire.subjects.subject-table',compact('subjects'));
    }
}
