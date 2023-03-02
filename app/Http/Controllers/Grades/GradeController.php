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
       * This method expects a POST request with form data containing the name_en, name_ar, and notes fields.
        It first validates the data using the validate() method of the $request object.
        If validation passes, it creates a new Grade object with the English and Arabic names and notes,
        and saves it to the database using the create() method. It then redirects back to the 'grade' page with a success message.
        If validation fails, it redirects back to the 'grade' page with an error message.
       * Note that this method uses Laravel's built-in localization feature, which allows for translation of messages and other text elements.
        The trans() function is used to translate the 'alert.createdgrade' and 'alert.error' strings into the appropriate language based on the current locale.
     */


        public function store(Request $request): RedirectResponse
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
            };

            // If validation failed, redirect to the 'grade' page with an error message
            return Redirect::route('grade')->with('error', trans('alert.error'));
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
