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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //Create New Grade and Validate the data
        $newgrade = $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'notes'=>'nullable'
        ]);
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

            return Redirect::route('grade')->with('success', trans('alert.createdgrade'));
        };



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
        //Delete All Grade Selected in GradeTable
        $deletegrade = Grade::destroy($id);

        if($deletegrade)
        {

            return Redirect::route('grade')->with('success',trans('alert.deletedgrade'));
        }

        return Redirect::route('grade')->with('error', trans('alert.error'));

    }
}
