<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Grade;
use Livewire\WithPagination;
use Carbon\Carbon;


class StudentsGraduationsTable extends Component
{

    use WithPagination;


    public $search;
    public $start_date;
    public $end_date;

    public function render()
    {
        $studentQuery = Student::onlyTrashed()->where('graduated', true);

        if ($this->search) {
            $studentQuery->where('name','like','%'.$this->search.'%')->orWhere(function ($query) {
                $query->orWhereHas('user', function ($query) {
                    $query->where('email', 'like', '%' . $this->search . '%');
                });
            });
        }

        // add filter to only show students with graduation date (deleted_at) within the selected date range
        if ($this->start_date && $this->end_date) {
            $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();

            $students = $studentQuery->whereNotNull('deleted_at')
                                    ->whereBetween('deleted_at', [$this->start_date, $end_date])
                                    ->paginate(10);
        } else {
            $students = $studentQuery->whereNotNull('deleted_at')->paginate(10);
        }
        return view('livewire.students-graduations-table',compact('students'));
    }
}
