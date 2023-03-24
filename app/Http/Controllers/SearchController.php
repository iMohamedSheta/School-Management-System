<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
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


    public function searchClassrooms(Request $request)
{
    $search = $request->input('q');
    $classrooms = Classroom::where('name', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%")
                            ->orderBy('name')
                            ->get();

    return response()->json($classrooms);
}




}
