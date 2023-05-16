<?php

namespace App\Http\Livewire\Exams;

use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;

class ExamTable extends Component
{
    use WithPagination;
    public $search;

    public $listeners = ['deleted'=>'$refresh','edited'=>'$refresh'];

    public function render()
    {

        $examQuery = Exam::query();

        if ($this->search) {
            $examQuery->where(function ($query) {

                $query->where('name', 'like', '%' . $this->search . '%')

                ->orWhereHas('subject', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            });
        }


        $exams= $examQuery->paginate(10);

        return view('livewire.exams.exam-table',compact('exams'));
    }
}
