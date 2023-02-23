<?php

use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

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

require_once(__DIR__.'/Jetstream.php');


// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {
        return view('layouts.master');
    })->name('dashboard');
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){

        	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

            Route::get('/',fn()=>view('layouts.master'))->name('master');


            Route::resource('grade',GradeController::class);

    });



/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/





