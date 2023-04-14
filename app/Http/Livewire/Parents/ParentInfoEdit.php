<?php

namespace App\Http\Livewire\Parents;

use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Specialization;
use App\Models\Type_Blood;
use Livewire\Component;

class ParentInfoEdit extends Component
{
    public $parent;
    public $parentStep = 1;
    public $nationalities;
    public $religions;
    public $blood_types;
    public $specializations;

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



    public function mount($parent)
    {
        $this->parent = $parent;

        $this->Name_Father = $parent->Name_Father;
        $this->National_ID_Father = $parent->National_ID_Father;
        $this->Passport_ID_Father = $parent->Passport_ID_Father;
        $this->Phone_Father = $parent->Phone_Father;
        $this->Job_Father = $parent->Job_Father;
        $this->Address_Father = $parent->Address_Father;
        $this->Nationality_Father_id = $parent->Nationality_Father_id;
        $this->Religion_Father_id = $parent->Religion_Father_id;
        $this->Blood_Type_Father_id = $parent->Blood_Type_Father_id;

        $this->Name_Mother = $parent->Name_Mother;
        $this->National_ID_Mother = $parent->National_ID_Mother;
        $this->Passport_ID_Mother = $parent->Passport_ID_Mother;
        $this->Phone_Mother = $parent->Phone_Mother;
        $this->Job_Mother = $parent->Job_Mother;
        $this->Address_Mother = $parent->Address_Mother;
        $this->Nationality_Mother_id = $parent->Nationality_Mother_id;
        $this->Religion_Mother_id = $parent->Religion_Mother_id;
        $this->Blood_Type_Mother_id = $parent->Blood_Type_Mother_id;
    }


    public function render()
    {
        $this->nationalities=Nationalitie::all();
        $this->blood_types=Type_Blood::all();
        $this->religions=Religion::all();
        $this->specializations=Specialization::all();
        return view('livewire.parent-info-edit');
    }

    public function nextParentStep()
    {
        $this->parentStep = 2;
    }

    public function perviousParentStep()
    {
        $this->parentStep = 1;
    }


    public function updateStudentInfo()
    {
        $validatedData = $this->validate([
            'Name_Father' => 'required|string',
            'National_ID_Father' => "required_if:Passport_ID_Father,Null",
            'Passport_ID_Father' => 'required_if:National_ID_Father,Null',
            'Phone_Father' => 'required',
            'Address_Father' => 'required',
            'Nationality_Father_id' => 'required',
            'Religion_Father_id' => 'required',

            'Name_Mother' => 'required|string',
            'National_ID_Mother' => "required_if:Passport_ID_Mother,Null",
            'Passport_ID_Mother' => 'required_if:National_ID_Mother,Null',
            'Phone_Mother' => 'required',
            'Address_Mother' => 'required',
            'Nationality_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
        ]);


        if($validatedData)
        {

          $updateParent = $this->parent
          ->update([
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
                    "Blood_Type_Mother_id" => $this->Blood_Type_Mother_id,
                ]);
        }


        if($updateParent)
        {
            return redirect()->route('parent.info',$this->parent->id)->with('success',trans('alert.parent-updated'));
        }

    }

}
