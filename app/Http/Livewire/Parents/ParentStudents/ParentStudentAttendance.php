<?php

namespace App\Http\Livewire\Parents\ParentStudents;

use App\Models\Attendances;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ParentStudentAttendance extends Component
{
    use WithPagination;

    public $children;
    public $selectedChild;
    public $start_date;
    public $end_date;
    public $selectedAttendanceType;

    public function mount()
    {
        // Retrieve the authenticated parent's children
        $this->children = auth()->user()->parent->students;
    }
    public function loadAttendances()
    {
        $query = Attendances::query()->where('student_id', $this->selectedChild);
        if($this->selectedAttendanceType == '1')
        {
            $query->where('attendence_status',true);
        }
        elseif($this->selectedAttendanceType == '0')
        {
            $query->where('attendence_status',false);
        }
        if ($this->start_date && $this->end_date) {
            $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();
            $query->whereBetween('attendence_date', [$this->start_date, $end_date]);
        }

        return $attendanceData = $query->paginate(10);
    }



    public function render()
    {

        if($this->selectedChild)
        {
            $attendances= $this->loadAttendances();
        }
        else
        {
            $firstChildId = auth()->user()->parent->students->first()->id;
            $query = Attendances::query()->where('student_id', $firstChildId);
            if ($this->start_date && $this->end_date) {
                $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();
                $query->whereBetween('attendence_date', [$this->start_date, $end_date]);
            }
            if($this->selectedAttendanceType == '1')
            {
                $query->where('attendence_status',true);
            }
            elseif($this->selectedAttendanceType == '0')
            {
                $query->where('attendence_status',false);
            }
            $attendances = $query->paginate(10);


        }
        return view('livewire.parents.parent-students.parent-student-attendance',compact('attendances'));
    }
}
