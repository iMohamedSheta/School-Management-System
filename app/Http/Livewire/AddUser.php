<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\PasswordValidationRules;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AddUser extends Component
{
    use PasswordValidationRules;

    public $currentStep = 1;
    public $step1Data = [];
    public $step2Data = [];
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $terms;


    public function goToStep($step)
    {
        $this->currentStep = $step;
    }
    public function render()
    {
        return view('livewire.add-user');
    }

    public function submitStep1Form()
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

    $usercreated = User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
    ]);

    $this->step1Data = $validatedData;

    // advance to the next step
    if($usercreated){
        $this->currentStep++;
    }
}



    public function submitStep2Form()
    {
        $validatedData = $this->validate([
            'step2Data.field3' => 'required',
            'step2Data.field4' => 'required',
        ]);

        $this->step2Data = $validatedData;

        // perform data processing for both steps
        $parentData = array_merge($this->step1Data, $this->step2Data);

        // save the parent data to the database or perform other operations
        // ...

        // reset the component state for the next use
        $this->currentStep = 1;
        $this->step1Data = [];
        $this->step2Data = [];
    }
}
