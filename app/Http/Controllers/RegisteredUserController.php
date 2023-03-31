<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisteredUserController
{
    //

public function create(Request $request): View
{
    $roles = Role::all();
    return view('register', ['roles' => $roles]);
}


}
