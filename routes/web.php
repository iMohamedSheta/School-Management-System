<?php

use App\Http\Controllers\Grades\GradeController;
use App\Http\Livewire\Grades\Grades;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


                /** ADD ALL LOCALIZED AND AUTH ROUTES INSIDE THIS GROUP **/

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ], function(){

                    Route::get('welcome',function(){

                        toast('Success Toast','success');
                        return view('welcome');

                    });

                     /** ADD ALL LOCALIZED AND AUTHENTICATED ROUTES Down THIS **/

                    //Auth Routes Page Add.
                    require_once(__DIR__.'/Jetstream.php');

                Route::get('/',fn()=>view('layouts.master'))->name('master');


                // Route::get('dashboard',fn()=>view('dashboard'))->name('dashbaord');


                Route::group(['namespace' => 'Grades'],function()
                    {

                        Route::get('grade',[GradeController::class,'index'])->name('grade');
                        Route::post('grade',[GradeController::class,'store'])->name('grade.store');
                        Route::delete("grade/delete/{id}",[GradeController::class,'destroy'])->name('grade.destroy');

                    });



        });

                 /** OTHER PAGES THAT SHOULD NOT BE LOCALIZED BUT AUTHENTICATED **/







});


                 /** OTHER PAGES THAT SHOULD NOT BE LOCALIZED OR AUTHENTICATED **/










