
<?php

// Import the necessary classes and libraries

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\FormRepeater;

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



                    Route::middleware(['auth', 'isAdmin'])->group(function () {
                        Route::get('roles',[UserRoleController::class,'index'])->name('user-role.index');
                        Route::post('roles',[UserRoleController::class,'assignrole'])->name('user-role.assign');
                        Route::get('/user/search', [SearchController::class, 'searchUsers'])->name('user.search');

                        Route::group(['namespace' => 'Classrooms'], function () {
                            Route::get('classrooms', [ClassroomController::class, 'index'])->name('classrooms.index');
                            Route::post('classrooms', [FormRepeater::class, 'store'])->name('classroom.store');
                            Route::get('classrooms/{classroom}/edit', [ClassroomController::class, 'edit'])->name('classroom.edit');
                            Route::put('classrooms/{classroom}', [ClassroomController::class, 'update'])->name('classroom.update');
                            Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('classroom.destroy');
                        });




                            // Define a route group for grade-related pages
                            Route::group(['namespace' => 'Grades'],function()
                            {
                                // Define a route for the grade index page
                                Route::get('grade',[GradeController::class,'index'])->name('grade');
                                // Define a route for the grade store action
                                Route::post('grade',[GradeController::class,'store'])->name('grade.store');
                                // Define a route for the grade delete action
                                Route::delete("grade/delete/{id}",[GradeController::class,'destroy'])->name('grade.destroy');
                            });

                    });


                    // Import Jetstream authentication routes
                    require_once(__DIR__.'/Jetstream.php');

                    // Define a route for the application's homepage
                    Route::get('/',fn()=>view('layouts.master'))->name('master');



                });


            // Define other pages that require authentication but should not be localized

        });

        // Define other pages that should not require authentication or localization.
