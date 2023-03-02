
<?php

// Import the necessary classes and libraries
use App\Http\Controllers\Grades\GradeController;
use Illuminate\Support\Facades\Route;

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

// This comment section is a description of the purpose of the file and how it is used.

        // Define the routes that require authentication
        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified'
        ])->group(function () {

            // Define a localized route group for authenticated users
            Route::group(
                [
                    'prefix' => LaravelLocalization::setLocale(),
                    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
                ], function(){

                    // Define a localized welcome page that displays a success toast
                    Route::get('welcome',function(){
                        toast('Success Toast','success');
                        return view('welcome');
                    });

                    // Import Jetstream authentication routes
                    require_once(__DIR__.'/Jetstream.php');

                    // Define a route for the application's homepage
                    Route::get('/',fn()=>view('layouts.master'))->name('master');

                    // Define a route group for grade-related pages
                    Route::group(['namespace' => 'Grades'],function() {
                        // Define a route for the grade index page
                        Route::get('grade',[GradeController::class,'index'])->name('grade');
                        // Define a route for the grade store action
                        Route::post('grade',[GradeController::class,'store'])->name('grade.store');
                        // Define a route for the grade delete action
                        Route::delete("grade/delete/{id}",[GradeController::class,'destroy'])->name('grade.destroy');
                    });
                });

            // Define other pages that require authentication but should not be localized

        });

        // Define other pages that should not require authentication or localization.
