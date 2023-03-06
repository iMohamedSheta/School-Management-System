<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchUsers(Request $request)
    {
        $query = $request->input('q');

        // Search for users whose names start with the query
        $users = User::where('name', 'like', $query . '%')->take(5)->get();

        return response()->json($users);
    }
}
