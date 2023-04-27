
<?php

// Import the necessary classes and libraries

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Parents\ParentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\PromotionsController;
use App\Http\Controllers\Students\GraduationController;
use App\Http\Controllers\Fees\FeeController;
use App\Http\Controllers\Fees\FeeInvoiceController;
use App\Http\Controllers\Fees\ReceiptController;
use App\Http\Controllers\Fees\ProcessingFeeController;

use App\Http\Livewire\PostComponent;

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


//Jetstream import for routes
use Laravel\Fortify\Features;
use App\Http\Controllers\RegisteredUserController as ControllersRegisteredUserController;



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


                        Route::get('test',[UserRoleController::class,'test']);


                        // Registration...
                        if (Features::enabled(Features::registration())) {
                            $enableViews = config('fortify.views', true);

                            if ($enableViews) {
                                Route::get('/register', [ControllersRegisteredUserController::class, 'create'])
                                    ->name('register');
                            }

                            Route::post('/register', [CreateNewUser::class, 'store']);
                        }


                        //Classrooms Page Routes
                        Route::get('classrooms/search', [SearchController::class, 'searchClassrooms'])->name('classrooms.search');
                        Route::group(['namespace' => 'Classrooms'], function () {
                            Route::get('classrooms', [ClassroomController::class, 'index'])->name('classrooms.index');
                            Route::post('classrooms', [ClassroomController::class, 'filterGrades'])->name('classroom.filter');
                            Route::put('classrooms/{id}', [ClassroomController::class, 'update'])->name('classroom.update');
                            Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('classroom.destroy');
                            Route::delete('classrooms', [ClassroomController::class, 'deleteSelected'])->name('classroom.deleteselected');
                        });

                        //Create User Page Routes
                        Route::get('users/add',fn()=>view('addusers'))->name('users.add');
                        Route::get('/parents/search', [SearchController::class, 'searchParents'])->name('parents.search');


                        //Students Page Routes And Promotions
                        Route::group(['namespace'=>"Students"],function()
                        {
                            //students
                            Route::get('students',[StudentController::class,"index"])->name('students.index');
                            Route::get('student/information/{id}',[StudentController::class,"studentInfoView"])->name('student.info');
                            Route::get('student/edit/{id}',[StudentController::class,"studentInfoEditView"])->name('student.edit');
                            Route::get('student/email/edit/{id}',[StudentController::class,"studentEmailEditView"])->name('student.email.edit');
                            Route::delete('student/delete',[StudentController::class,"destroy"])->name('student.destroy');
                            Route::delete('students/delete',[StudentController::class,"deleteSelected"])->name('students.selected.destroy');


                            //Students Promotions
                            Route::get('students/promotions',[PromotionsController::class,'index'])->name('students.promotions.classroom');
                            Route::post('student/promotion/back',[PromotionsController::class,'studentPromotionBack'])->name('student.promotion.back');
                            Route::post('students/promotions/back',[PromotionsController::class,'studentSelectedPromotionBack'])->name('students.promotions.back');
                            Route::get('students/promotions/table',[PromotionsController::class,'studentsPromotionsTableView'])->name('students.promotions.table');
                            Route::post('students/promoteclassroom',[PromotionsController::class,'promoteClassroom'])->name('students.promotions.store');


                            Route::get('students/graduation',[GraduationController::class,'index'])->name('students.graduations.classroom');
                            Route::post('students/graduateclassroom',[GraduationController::class,'graduateclassroom'])->name('students.graduations.store');
                            Route::get('students/graduated',[GraduationController::class,'studentsGraduatedTableView'])->name('students.graduated.table');
                            Route::post('student/graduation/back',[GraduationController::class,'studentGraduationBack'])->name('student.graduation.back');
                            Route::post('students/graduations/back',[GraduationController::class,'studentSelectedGraduationBack'])->name('students.graduations.back');

                        });

                        Route::group(['namespace'=>"Fees"],function()
                        {
                            Route::get('fees',[FeeController::class,'index'])->name('fees.index');
                            Route::get('fee/information/{id}',[FeeController::class,'feeInfoView'])->name('fee.info');
                            Route::get('fee/edit/{id}',[FeeController::class,'feeInfoEditView'])->name('fee.edit');
                            Route::get('fee/create',[FeeController::class,'createClassroomFee'])->name('fee.create');
                            Route::delete('fee/delete',[FeeController::class,'destroy'])->name('fee.destroy');
                            Route::delete('fees/delete',[FeeController::class,'deleteSelected'])->name('fees.selected.destroy');

                            Route::get('fees/types',[FeeController::class,'feesTypeView'])->name('fees.types.index');
                            Route::delete('fee/type/delete',[FeeController::class,'feesTypeDestroy'])->name('fee.type.destroy');
                            Route::delete('fee/types/delete',[FeeController::class,'feeTypeSelectedDestroy'])->name('feetypes.selected.destroy');


                            Route::get('feesinvoices',[FeeInvoiceController::class,'index'])->name('feesinvoices.index');
                            Route::get('feeinvoice/create/{id}',[FeeInvoiceController::class,'viewCreateFeeInvoice'])->name('feeinvoice.create');
                            Route::delete('feesinvoices/delete',[FeeInvoiceController::class,'feesInvoicesDeleteSelected'])->name('feesinvoices.selected.destroy');



                            Route::get('receipts',[ReceiptController::class,'index'])->name('receipts.index');
                            Route::get('receipt/create/{id}',[ReceiptController::class,'viewCreateReceipt'])->name('receipt.create');
                            Route::delete('receipts/delete',[ReceiptController::class,'receiptsDeleteSelected'])->name('receipts.selected.destroy');


                            Route::get('processingfees',[ProcessingFeeController::class,'index'])->name('processingfees.index');
                            Route::get('processingfee/create/{id}',[ProcessingFeeController::class,'viewCreateProcessingFee'])->name('processingfee.create');
                            Route::delete('processingfees/delete',[ProcessingFeeController::class,'processingfeesDeleteSelected'])->name('processingfees.selected.destroy');
                        });



                        //Teachers Page Routes
                        Route::group(['namespace'=>"Teachers"],function()
                        {
                            Route::get('teachers',[TeacherController::class,'index'])->name('teachers.index');
                            Route::get('teacher/information/{id}',[TeacherController::class,"teacherInfoView"])->name('teacher.info');
                            Route::get('teacher/edit/{id}',[TeacherController::class,"teacherInfoEditView"])->name('teacher.edit');
                            Route::get('teacher/email/edit/{id}',[TeacherController::class,"teacherEmailEditView"])->name('teacher.email.edit');
                            Route::delete('teacher/delete',[TeacherController::class,"destroy"])->name('teacher.destroy');
                            Route::delete('teachers/delete',[TeacherController::class,"deleteSelected"])->name('teachers.selected.destroy');
                        });


                        //Parents Page Routes
                        Route::group(['namespace'=>'Parents'],function()
                        {
                            Route::get('parents',[ParentController::class,'index'])->name('parents.index');
                            Route::get('parent/information/{id}',[ParentController::class,"parentInfoView"])->name('parent.info');
                            Route::get('parent/edit/{id}',[ParentController::class,"parentInfoEditView"])->name('parent.edit');
                            Route::get('parent/email/edit/{id}',[ParentController::class,"parentEmailEditView"])->name('parent.email.edit');

                            Route::delete('parent/delete',[ParentController::class,"destroy"])->name('parent.destroy');
                            Route::delete('parents/delete',[ParentController::class,"deleteSelected"])->name('parents.selected.destroy');
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
                    Route::get('/',[DashboardController::class,'index'])->name('master');
                    Route::view('posts',"posts")->name('posts.index');

                    Route::post('posts',[PostComponent::class,'uploadImage'])->name('posts.image-upload');
                    Route::post('posts/save',[PostController::class,'savePost'])->name('posts.save');
                    Route::delete('post/delete',[PostController::class,'destroy'])->name('posts.destroy');
                    Route::get('post/{id}',[PostController::class,'index'])->name('post.show');
                    Route::delete('notification/read',[NotificationController::class,'removeNewCommmentNotification'])->name('notificationNewComment.remove');


                });


            // Define other pages that require authentication but should not be localized

        });

        // Define other pages that should not require authentication or localization.



        // Import Jetstream Features routes
        require_once(__DIR__.'/jetstreamFeatures.php');








