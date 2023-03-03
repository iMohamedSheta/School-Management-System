<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;


class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //Return view for user
        return view('layouts.grades');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {


    }

    /*

     */


        public function store(Request $request): RedirectResponse
        {
            if(Grade::where('name->ar',$request->name_ar)->orWhere ('name->en',$request->name_en)->exists() == False)
            {
                //Create New Grade and Validate the data
                $newgrade = $request->validate([
                    'name_en'=>'required',
                    'name_ar'=>'required',
                    'notes'=>'nullable'
                ]);

                // If validation passed, create a new grade and save it to the database
                if($newgrade)
                {
                    Grade::create([
                        'name'=>
                            [
                                'en'=> $request->name_en,
                                'ar'=> $request->name_ar,
                            ],
                        'notes'=> $request->notes,
                    ]);

                    // Redirect to the 'grade' page with a success message
                    return Redirect::route('grade')->with('success', trans('alert.createdgrade'));
                }
                    // If validation failed, redirect to the 'grade' page with an error message
                    return Redirect::route('grade')->with('error', trans('alert.error'));
            };

                // If the name* exists on grade table, redirect to the 'grade' page with an exists error message
                return Redirect::route('grade')->with('error', trans('alert.exists-error'));

        }


    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id): RedirectResponse
        {
            // Delete the grade with the given ID from the database
            $deletegrade = Grade::destroy($id);

            // If the grade was successfully deleted...
            if($deletegrade)
            {
                // Return a redirect to the grade route with a success message in the session
                return Redirect::route('grade')->with('success',trans('alert.deletedgrade'));
            }

            // If the grade was not successfully deleted...
            // Return a redirect to the grade route with an error message in the session
            return Redirect::route('grade')->with('error', trans('alert.error'));
        }

}
