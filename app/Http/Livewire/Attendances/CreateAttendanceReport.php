<?php

namespace App\Http\Livewire\Attendances;

use App\Exports\AttendancesClassroomExport;
use Livewire\Component;
use App\Models\Classroom;
use App\Models\Grade;
use Maatwebsite\Excel\Facades\Excel;


class CreateAttendanceReport extends Component
{
    public $name;
    public $classrooms=[];
    public $grade_id;
    public $classroom_id;
    public $date;

    protected $listeners = ['updatedGradeId'];


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function exportAttendanceForDate()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'date' => 'required',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        return Excel::download(new AttendancesClassroomExport($this->grade_id, $this->classroom_id,$this->date),$this->name.'.xlsx');
    }

    public function render()
    {
        $grades=Grade::all();
        return view('livewire.attendances.create-attendance-report',compact('grades'));
    }
}
