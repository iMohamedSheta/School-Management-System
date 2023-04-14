<?php

namespace App\Http\Livewire\Parents;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ParentEmailEdit extends Component
{
    public $parent_user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($parent_user)
    {
        $this->parent_user = $parent_user;
        $this->name = $parent_user->name;
        $this->email = $parent_user->email;
    }


      public function editUserEmail()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email'=>'required|email',
        ]);


        if($validatedData)
        {

          $updateparentEmail = $this->parent_user
          ->update([
                    "name" => $this->name,
                    'email'=>$this->email,
                ]);
        }

        if($updateparentEmail)
        {
            return redirect()->route('parent.email.edit',$this->parent_user->id)->with('success',trans('alert.parent-updated'));
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
          $updateparentPassword = $this->parent_user
          ->update([
                    "password" => Hash::make($this->password),
                ]);
        }

        if($updateparentPassword)
        {
            return redirect()->route('parent.email.edit',$this->parent_user->id)->with('success',trans('alert.parent-updated'));
        }
    }
    public function render()
    {
        return view('livewire.parent-email-edit');
    }
}
