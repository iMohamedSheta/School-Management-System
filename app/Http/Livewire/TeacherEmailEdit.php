<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class TeacherEmailEdit extends Component
{
    public $teacher_user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($teacher_user)
    {
        $this->teacher_user = $teacher_user;
        $this->name = $teacher_user->name;
        $this->email = $teacher_user->email;
    }


      public function editUserEmail()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email'=>'required|email',
        ]);


        if($validatedData)
        {

          $updateTeacherEmail = $this->teacher_user
          ->update([
                    "name" => $this->name,
                    'email'=>$this->email,
                ]);
        }

        if($updateTeacherEmail)
        {
            return redirect()->route('teacher.email.edit',$this->teacher_user->id)->with('success',trans('alert.teacher-updated',['name'=>$this->teacher_user->teacher->teacher_name]));
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
          $updateTeacherPassword = $this->teacher_user
          ->update([
                    "password" => Hash::make($this->password),
                ]);
        }

        if($updateTeacherPassword)
        {
            return redirect()->route('teacher.email.edit',$this->teacher_user->id)->with('success',trans('alert.teacher-updated',['name'=>$this->teacher_user->teacher->teacher_name]));
        }
    }

    public function render()
    {
        return view('livewire.teacher-email-edit');
    }
}
