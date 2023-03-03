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

        // Check if the user already has the role
        if ($user->hasRole($role->name))
        {
            return redirect()->back()->withErrors(['role_id' => 'The user already has this role.']);
        }


        $user->roles()->attach($role);
        return redirect()->back()->with('success', 'Role assigned successfully');
    }



    public function searchUsers(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('name', 'like', '%'.$search.'%')->get();

        return response()->json($users);
    }


}
