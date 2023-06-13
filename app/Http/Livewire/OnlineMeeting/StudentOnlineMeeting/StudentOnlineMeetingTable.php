<?php

namespace App\Http\Livewire\OnlineMeeting\StudentOnlineMeeting;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\OnlineClass;
use Livewire\Component;
use Livewire\WithPagination;

class StudentOnlineMeetingTable extends Component
{
    use WithPagination;

    public $search;
    public $classrooms=[];
    public $selectedGrade;
    public $selectedClassroom;

    protected $listeners = ['updatedGradeId'];

    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }


    public function render()
    {
        $meetingsQuery = OnlineClass::query();

        if ($this->selectedGrade && $this->selectedGrade !== 'AllGrades') {
            $meetingsQuery->where('grade_id', $this->selectedGrade);
        }

        if ($this->selectedClassroom && $this->selectedClassroom !== 'AllClassrooms') {
            $meetingsQuery->where('classroom_id', $this->selectedClassroom);
        }
        if ($this->search) {
            $meetingsQuery->where(function ($query) {
                $query->where('topic', 'like', '%' . $this->search . '%')
                ->orWhere('description','like', '%'.$this->search.'%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                        ->orWhere('name','like','%'.$this->search.'%');
                    });
            });
        }

        $meetings=$meetingsQuery->orderBy('created_at','desc')->paginate(10);
        $grades=Grade::all();
        return view('livewire.online-meeting.student-online-meeting.student-online-meeting-table',compact('meetings','grades'));
    }
}
