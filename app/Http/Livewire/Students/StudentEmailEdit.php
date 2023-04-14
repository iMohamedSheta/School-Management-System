<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;


class StudentEmailEdit extends Component
{
    public $student_user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($student_user)
    {
        $this->student_user = $student_user;
        $this->name = $student_user->name;
        $this->email = $student_user->email;
    }

    public function editUserEmail()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email'=>'required|email',
        ]);


        if($validatedData)
        {

          $updateStudentEmail = $this->student_user
          ->update([
                    "name" => $this->name,
                    'email'=>$this->email,
                ]);
        }

        if($updateStudentEmail)
        {
            return redirect()->route('student.email.edit',$this->student_user->id)->with('success',trans('alert.student-updated'));
        }
    }
    public function editUserPassword()
    {
        $validatedData = $this->validate([
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[0-9]/', // at least one numeric character
                'regex:/[!@#$%^&*()\-_=+{};:,<.>]/', // at least one special character
            ],
        ]);


        if($validatedData)
        {
          $updateStudentPassword = $this->student_user
          ->update([
                    "password" => Hash::make($this->password),
                ]);
        }

        if($updateStudentPassword)
        {
            return redirect()->route('student.email.edit',$this->student_user->id)->with('success',trans('alert.student-updated'));
        }
    }

    public function render()
    {
        return view('livewire.student-email-edit');
    }
}
