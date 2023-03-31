<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Gender;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use App\Models\Role;
use App\Models\Specialization;
use App\Models\Type_Blood;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;


class AddUser extends Component
{
    use PasswordValidationRules;

    public $currentStep = 1;
    public $parentStep = 1;

    public $user_created_id;
    public $user_created_role;

    public $roles;
    public $user;
    public $nationalities;
    public $religions;
    public $blood_types;
    public $specializations;
    public $genders;
    public $grades;
    public $classrooms=[];

    // Form 1 register user
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $terms;


    // Form 2 register role to user
    public $user_id;
    public $role_id;

    // Form  3

        //Student informations
        public $name_student;
        public $academic_year;
        public $date_birth;
        //public $blood_type_id;
        //public $nationality_id;
        public $parent_id;
        //public $religion_id;
        //public $gender_id;
        public $grade_id;
        public $classroom_id;

        //Parent informations

            //father info
            public $Name_Father;
            public $National_ID_Father;
            public $Passport_ID_Father;
            public $Phone_Father;
            public $Job_Father;
            public $Address_Father;
            public $Nationality_Father_id;
            public $Religion_Father_id;
            public $Blood_Type_Father_id;

            //mother info
            public $Name_Mother;
            public $National_ID_Mother;
            public $Passport_ID_Mother;
            public $Phone_Mother;
            public $Job_Mother;
            public $Address_Mother;
            public $Nationality_Mother_id;
            public $Religion_Mother_id;
            public $Blood_Type_Mother_id;



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

        protected $listeners = ['updatedGradeId','selectedParent' => 'handleInput'];



    public function handleInput($parent_id, $value)
    {
        $this->$parent_id = $value;
    }


    public function goToStep($step)
    {
        $this->currentStep = $step;
    }


    public function nextParentStep()
    {
        $this->parentStep = 2;
    }

    public function perviousParentStep()
    {
        $this->parentStep = 1;
    }


    public function createUser()
{
    $validatedData = Validator::make([
        'name' => $this->name,
        'email' => $this->email,
        'password' => $this->password,
        'password_confirmation'=>$this->password_confirmation,
        'terms' => $this->terms,
    ], [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    ])->validate();

    if($validatedData)
    {
        $usercreated = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
    }


    // advance to the next step
    if($usercreated){
        $this->user_created_id = $usercreated->id;
        $this->currentStep++;
    }
}



    public function assignRole()
    {
        $validatedData = $this->validate([
            'user_created_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        if($validatedData)
        {
            $this->user = $user = User::findorFail($validatedData['user_created_id']);
            $role = Role::findorFail($validatedData['role_id']);
            $user->roles()->attach($role);
            $this->user_created_role = $role->name;
            $this->currentStep++;
            $this->emit('parentSearched');

        }

        // reset the component state for the next use
        // $this->currentStep = 1;

    }


    public function insertParentInfo()
    {
        $validatedData = $this->validate([
            'user_created_id' => 'required|exists:users,id',
            'Name_Father' => 'required|string',
            'National_ID_Father' => "required_if:Passport_ID_Father,null",
            'Passport_ID_Father' => 'required_if:National_ID_Father,null',
            'Phone_Father' => 'required',
            'Address_Father' => 'required',
            'Nationality_Father_id' => 'required',
            'Religion_Father_id' => 'required',

            'Name_Mother' => 'required|string',
            'National_ID_Mother' => "required_if:Passport_ID_Mother,null",
            'Passport_ID_Mother' => 'required_if:National_ID_Mother,null',
            'Phone_Mother' => 'required',
            'Address_Mother' => 'required',
            'Nationality_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',

        ]);

        if($validatedData)
        {
            $createParent = MyParent::create(
                [
                    "user_id" => $this->user_created_id,

                    "Name_Father" => $this->Name_Father,
                    "National_ID_Father" => $this->National_ID_Father,
                    "Passport_ID_Father" => $this->Passport_ID_Father,
                    "Phone_Father" => $this->Phone_Father,
                    "Address_Father" => $this->Address_Father,
                    "Job_Father" => $this->Job_Father,
                    "Nationality_Father_id" => $this->Nationality_Father_id,
                    "Religion_Father_id" => $this->Religion_Father_id,
                    "Blood_Type_Father_id" => $this->Blood_Type_Father_id,

                    "Name_Mother" => $this->Name_Mother,
                    "National_ID_Mother" => $this->National_ID_Mother,
                    "Passport_ID_Mother" => $this->Passport_ID_Mother,
                    "Phone_Mother" => $this->Phone_Mother,
                    "Address_Mother" => $this->Address_Mother,
                    "Job_Mother" => $this->Job_Mother,
                    "Nationality_Mother_id" => $this->Nationality_Mother_id,
                    "Religion_Mother_id" => $this->Religion_Mother_id,
                    "Blood_Type_Father_id" => $this->Blood_Type_Mother_id,

                ]
                );
                if($createParent)
                {
                    $this->currentStep++;
                }
        }


    }

    public function insertTeacherInfo()
    {
        $validatedData = $this->validate([
            'user_created_id' => 'required|exists:users,id',
            'teacher_name' => 'required|string',
            'national_id_teacher' => "required_if:passport_id_teacher,null",
            'passport_id_teacher' => 'required_if:national_id_teacher,null',
            'phone_teacher' => 'required',
            'address' => 'required',
            'joining_date' => 'required',
        ]);

        if($validatedData)
        {
            $createTeacher = Teacher::create(
                [
                    "user_id" => $this->user_created_id,
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
                ]
                );
        }

        if($createTeacher)
        {
            $this->currentStep++;
        }

    }



    public function insertStudentInfo()
    {
        $validatedData = $this->validate([
            'user_created_id' => 'required|exists:users,id',
            'name_student' => 'required|string',
            'academic_year' => 'required',
            'date_birth' => 'required',
            'blood_type_id' => 'required|exists:type__bloods,id',
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
                return redirect()->route('users.add')->with('error','The Parent Doesn\'t have information make sure you add this parent information before add student information.');
            }

            $createStudent = Student::create(
                [
                    "user_id" => $this->user_created_id,
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
                ]
                );
        }


        if($createStudent)
        {
            $this->currentStep++;
        }

    }



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
        $this->nationalities=Nationalitie::all();
        $this->blood_types=Type_Blood::all();
        $this->religions=Religion::all();
        $this->roles=Role::all();
        $this->genders=Gender::all();
        $this->specializations=Specialization::all();
        $this->grades=Grade::all();
        // $this->classrooms=Classroom::all();

        return view('livewire.add-user');
    }



}
