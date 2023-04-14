<?php

namespace App\Http\Livewire\Students;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Models\User;
use Livewire\Component;

class StudentInfoEdit extends Component
{
    //Student informations
    public $name_student;
    public $academic_year;
    public $date_birth;
    public $blood_type_id;
    public $nationality_id;
    public $parent_id;
    public $religion_id;
    public $gender_id;
    public $grade_id;
    public $classroom_id;
    public $grades;
    public $classrooms;
    public $nationalities;
    public $religions;
    public $blood_types;
    public $genders;

    public $student;

    protected $listeners = ['updatedGradeId','selectedParent' => 'handleInput'];



    public function mount($student)
    {
        $this->student = $student;
        $this->name_student = $student->name;
        $this->academic_year = $student->academic_year;
        $this->date_birth = $student->date_birth;
        $this->blood_type_id = $student->blood_type_id;
        $this->nationality_id = $student->nationality_id;
        $this->parent_id = $student->parent->user_id;
        $this->religion_id = $student->religion_id;
        $this->gender_id = $student->gender_id;
        $this->grade_id = $student->grade_id;
        $this->classroom_id = $student->classroom_id;
        $this->classrooms = $student->grade->classrooms;
    }

    public function render()
    {
        $this->nationalities=Nationalitie::all();
        $this->blood_types=Type_Blood::all();
        $this->religions=Religion::all();
        $this->genders=Gender::all();
        $this->grades=Grade::all();

        return view('livewire.student-info-edit');
    }



    public function handleInput($parent_id, $value)
    {
        $this->$parent_id = $value;
    }

    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }




    public function updateStudentInfo()
    {
        $validatedData = $this->validate([
            'name_student' => 'required|string',
            'academic_year' => 'required',
            'date_birth' => 'required',
            'blood_type_id' => 'exists:type__bloods,id',
            'nationality_id' => 'required|exists:nationalities,id',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'parent_id' => 'required',
            'religion_id' => 'required|exists:religions,id',
            'gender_id' => 'required|exists:genders,id',
        ]);


        if($validatedData)
        {
            $get_parent_id = User::findOrFail($this->parent_id);
            if ($get_parent_id->parent->id)
            {
                $theparentid = $get_parent_id->parent->id;
            }
            else
            {
                return redirect()->route('student.info',$this->student->id)->with('error',trans('alert.father-info-empty'));
            }


          $updateStudent = $this->student
          ->update([
                    "name" => $this->name_student,
                    "academic_year" => $this->academic_year,
                    "date_birth" => $this->date_birth,
                    "parent_id" => $theparentid,
                    "classroom_id" => $this->classroom_id,
                    "nationality_id" => $this->nationality_id,
                    "religion_id" => $this->religion_id,
                    "blood_type_id" => $this->blood_type_id,
                    "gender_id" => $this->gender_id,
                    "grade_id" => $this->grade_id,
                ]);
        }


        if($updateStudent)
        {
            return redirect()->route('student.info',$this->student->id)->with('success',trans('alert.student-updated'));
        }

    }

}
