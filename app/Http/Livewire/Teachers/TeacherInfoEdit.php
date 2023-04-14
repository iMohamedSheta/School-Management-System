<?php

namespace App\Http\Livewire\Teachers;

use App\Models\Gender;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Specialization;
use App\Models\Type_Blood;
use Livewire\Component;

class TeacherInfoEdit extends Component
{
    public $teacher;
    public $nationalities;
    public $blood_types;
    public $religions;
    public $genders;
    public $specializations;

        //Teacher informations
        public $teacher_name;
        public $national_id_teacher;
        public $passport_id_teacher;
        public $phone_teacher;
        public $address;
        public $specialization_id;
        public $nationality_id;
        public $religion_id;
        public $blood_type_id;
        public $gender_id;
        public $joining_date;


    public function mount($teacher)
    {
        $this->teacher = $teacher;
        $this->teacher_name = $teacher->teacher_name;
        $this->national_id_teacher = $teacher->national_id_teacher;
        $this->passport_id_teacher = $teacher->passport_id_teacher;
        $this->phone_teacher = $teacher->phone_teacher;
        $this->address = $teacher->address;
        $this->specialization_id = $teacher->specialization_id;
        $this->nationality_id = $teacher->nationality_id;
        $this->religion_id = $teacher->religion_id;
        $this->blood_type_id = $teacher->blood_type_id;
        $this->gender_id = $teacher->gender_id;
        $this->joining_date = $teacher->joining_date;

    }

    public function render()
    {
        $this->nationalities=Nationalitie::all();
        $this->blood_types=Type_Blood::all();
        $this->religions=Religion::all();
        $this->genders=Gender::all();
        $this->specializations = Specialization::all();
        return view('livewire.teacher-info-edit');
    }



    public function updateTeacherInfo()
    {
        $validatedData = $this->validate([
            'teacher_name' => 'required|string',
            'national_id_teacher' => "required_if:passport_id_teacher,null",
            'passport_id_teacher' => 'required_if:national_id_teacher,null',
            'phone_teacher' => 'required',
            'address' => 'required',
            'joining_date' => 'required',
            'gender_id' => 'required',
        ]);


        if($validatedData)
        {

          $updateTeacher = $this->teacher
          ->update([
                    "teacher_name" => $this->teacher_name,
                    "national_id_teacher" => $this->national_id_teacher,
                    "passport_id_teacher" => $this->passport_id_teacher,
                    "phone_teacher" => $this->phone_teacher,
                    "address" => $this->address,
                    "specialization_id" => $this->specialization_id,
                    "nationality_id" => $this->nationality_id,
                    "religion_id" => $this->religion_id,
                    "blood_type_id" => $this->blood_type_id,
                    "gender_id" => $this->gender_id,
                    "joining_date" => $this->joining_date,
                ]);
        }


        if($updateTeacher)
        {
            return redirect()->route('teacher.info',$this->teacher->id)->with('success',trans('alert.student-updated'));
        }

    }





}
