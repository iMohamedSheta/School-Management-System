<?php

namespace App\Http\Livewire\Attendances;

use App\Exports\AttendancesClassroomExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;


class AttendanceClassroomTable extends Component
{
    public $students;
    public $classroom;
    public $search;
    public $selectedGrade;
    public $selectedClassroom;


    public function mount($classroom)
    {
        $this->selectedGrade= $classroom->grade_id;
        $this->selectedClassroom= $classroom->id;
    }

    public function exportAttendanceForToday()
    {
        return Excel::download(new AttendancesClassroomExport($this->selectedGrade, $this->selectedClassroom,date('Y-m-d')),'Attendances-'.$this->classroom->name.'.xlsx');
    }


    public function getFilteredStudents()
    {
        if (empty($this->search)) {
            return $this->students;
        } else {
            return $this->students->filter(function ($student) {
                return str_contains(strtolower($student->name), strtolower($this->search));
            });
        }
    }

    public function render()
    {

        return view('livewire.attendances.attendance-classroom-table');
    }
}
