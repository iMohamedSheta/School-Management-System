<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{




    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('roles', compact('users', 'roles'));
    }





    public function assignRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user = User::find($request->input('user_id'));
        $role = Role::find($request->input('role_id'));
        $trans_var = ['name'=>$user->name,'role'=>$role->name];
        // Check if the user already has the role
        if ($user->hasRole($role->name))
        {
            return redirect()->back()->with('error',trans('alert.error-role-exists',$trans_var));
        }


        $user->roles()->attach($role);
        return redirect()->back()->with('success', trans('alert.added-role',$trans_var));
    }






}
