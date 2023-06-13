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
use App\Http\Controllers\Fees\PaymentStudentController;
use App\Http\Controllers\Attendances\AttendancesController;
use App\Http\Controllers\Classrooms\ClassroomSubjectController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Meetings\OnlineClassController;
use App\Http\Controllers\Parents\ParentStudents\ParentStudentController;
use App\Http\Controllers\Teachers\TeacherClassroomController;
use App\Http\Controllers\Subjects\StudentSubjects\StudentSubjectController;
use App\Http\Controllers\AuditLogs\AuditLogController;
use App\Http\Controllers\SchoolSettings\AcademicYearController;

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

                        Route::group(['namespace' => 'AuditLogs'], function () {

                            Route::get('auditlogs',[AuditLogController::class,'index'])->name('auditlogs.index');

                        });

                        Route::group(['namespace' => 'SchoolSettings'], function () {

                            Route::get('academic_years',[AcademicYearController::class,'index'])->name('settings.academic_years.index');
                            Route::delete('academic_years',[AcademicYearController::class,'deleteSelected'])->name('settings.academic_years.selected.destroy');

                        });


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

                            Route::get('classroom/{id}/subjects', [ClassroomSubjectController::class, 'index'])->name('classroom.subjects.index');
                            Route::delete('classroom/subjects/remove/', [ClassroomSubjectController::class, 'deleteSelected'])->name('classroom.subjects.remove');


                        });

                        //Create User Page Routes
                        Route::get('users/add',fn()=>view('addusers'))->name('users.add');
                        Route::get('/parents/search', [SearchController::class, 'searchParents'])->name('parents.search');


                        //Students Routes
                        Route::group(['namespace'=>"Students"],function()
                        {
                            //students
                            Route::get('students',[StudentController::class,"index"])->name('students.index');
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

                            //Students Graduation
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



                            Route::get('receipt/vouchers',[ReceiptController::class,'index'])->name('receipts.index');
                            Route::get('receipt/create/{id}',[ReceiptController::class,'viewCreateReceipt'])->name('receipt.create');
                            Route::delete('receipts/delete',[ReceiptController::class,'receiptsDeleteSelected'])->name('receipts.selected.destroy');


                            Route::get('fees/excluded',[ProcessingFeeController::class,'index'])->name('processingfees.index');
                            Route::get('fee/exclude/{id}',[ProcessingFeeController::class,'viewCreateProcessingFee'])->name('processingfee.create');
                            Route::delete('fees/excluded/delete',[ProcessingFeeController::class,'processingfeesDeleteSelected'])->name('processingfees.selected.destroy');


                            Route::get('payment/vouchers',[PaymentStudentController::class,'index'])->name('payments.index');
                            Route::get('payment/create/{id}',[PaymentStudentController::class,'viewCreatePayment'])->name('payment.create');
                            Route::delete('payment/vouchers/delete',[PaymentStudentController::class,'paymentsDeleteSelected'])->name('payments.selected.destroy');
                        });

                        Route::group(['namespace'=>"Subjects"],function()
                        {
                            Route::get('subjects',[SubjectController::class,'index'])->name('subjects.index');
                            Route::get('subjects/create',[SubjectController::class,'viewCreateSubject'])->name('subjects.create');
                            Route::delete('subjects/delete',[SubjectController::class,'deleteSelected'])->name('subjects.selected.destroy');

                            Route::get('subjects/associate/classroom/{id}',[SubjectController::class,'viewAssociateClassroom'])->name('subjects.associate.classroom');
                        });
                        Route::group(['namespace'=>"exams"],function()
                        {
                            Route::get('exams',[ExamController::class,'index'])->name('exams.index');
                            Route::get('exams/create',[ExamController::class,'viewCreateExam'])->name('exams.create');
                            Route::delete('exams/delete',[ExamController::class,'deleteSelected'])->name('exams.selected.destroy');
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

                            Route::get('teachers/classrooms',[TeacherClassroomController::class,"index"])->name('teachers.classrooms');
                            Route::get('teacher/assign-classroom/{id}',[TeacherClassroomController::class,"create"])->name('teacher.assign.classroom');
                            Route::delete('teachers/assign-classroom',[TeacherClassroomController::class,"destroy"])->name('teacher.remove.assign.classroom');
                            Route::delete('teachers/assign-classrooms',[TeacherClassroomController::class,"deleteSelected"])->name('teacher.remove.selected.assign.classroom');
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
                                // Define a route for the gradSSe delete action
                                Route::delete("grade/delete/{id}",[GradeController::class,'destroy'])->name('grade.destroy');
                            });

                    });

                    Route::middleware(['auth', 'checkRole:Admin,Teacher'])->group(function () {

                        Route::group(['namespace'=>"Attendances"],function()
                        {
                            Route::get('attendances',[AttendancesController::class,'index'])->name('attendances.index');
                            Route::get('attendance/classroom/{id}',[AttendancesController::class,'viewAttendanceClassroom'])->name('attendance.classroom');
                            Route::post('attendance/classroom',[AttendancesController::class,'store'])->name('attendance.store');

                            Route::get('attendance/report',[AttendancesController::class,'viewAttendanceReport'])->name('attendance.report.export');
                        });
                        Route::group(['namespace'=>"Meetings"],function()
                        {
                            Route::get('meetings',[OnlineClassController::class,'index'])->name('meetings.index');
                            Route::get('meetings/create',[OnlineClassController::class,'create'])->name('meetings.create');
                            Route::post('meetings/create',[OnlineClassController::class,'createOnlineClass'])->name('meetings.store');
                            Route::delete('meetings/delete',[OnlineClassController::class,"deleteSelected"])->name('meetings.selected.destroy');
                        });


                    });

                    Route::middleware(['auth', 'checkRole:Teacher'])->group(function () {

                        Route::group(['namespace'=>"Teachers"],function()
                        {
                            Route::get('teacher/classrooms',[TeacherClassroomController::class,"viewTeacherClassrooms"])->name('teacher.classrooms');
                        });

                    });



                    // Import Jetstream authentication routes
                    require_once(__DIR__.'/Jetstream.php');

                    // Define a route for the application's homepage
                    Route::get('/',[DashboardController::class,'index'])->name('master');
                    Route::view('discussions',"posts")->name('posts.index');

                    Route::post('discussions',[PostComponent::class,'uploadImage'])->name('posts.image-upload');
                    Route::post('discussions/save',[PostController::class,'savePost'])->name('posts.save');
                    Route::delete('discussion/delete',[PostController::class,'destroy'])->name('posts.destroy');
                    Route::get('discussion/{id}',[PostController::class,'index'])->name('post.show');
                    Route::delete('notification/read',[NotificationController::class,'removeNewCommmentNotification'])->name('notificationNewComment.remove');

                    Route::middleware(['auth', 'checkRole:Student'])->group(function () {

                        Route::group(['namespace'=>"Subjects/StudentSubjects"],function()
                        {
                            Route::get('student/subjects/',[StudentSubjectController::class,"index"])->name('student.subjects.index');
                        });

                        Route::group(['namespace'=>"Meetings"],function()
                        {
                            Route::get('student/meetings',[OnlineClassController::class,'viewStudentOnlineClasses'])->name('meetings.student.index');
                        });

                    });

                    Route::middleware(['auth', 'checkRole:Parent'])->group(function () {

                        Route::group(['namespace'=>"Parents/ParentStudents"],function()
                        {
                            Route::get('parent/children',[ParentStudentController::class,"index"])->name('parent.students.index');
                            Route::get('parent/children/attendances',[ParentStudentController::class,"viewChildrenAttendance"])->name('parent.students.attendances');
                            Route::get('parent/children/invoices',[ParentStudentController::class,"viewChildrenInvoice"])->name('parent.students.invoices');
                            Route::get('parent/children/receipts',[ParentStudentController::class,"viewChildrenReceipt"])->name('parent.students.receipts');

                        });
                    });

                    Route::middleware(['auth', 'checkRole:Admin,Parent,Teacher'])->group(function () {

                        Route::group(['namespace'=>"Students"],function()
                        {
                            Route::get('student/information/{id}',[StudentController::class,"studentInfoView"])->name('student.info');
                        });
                    });

                });


            // Define other pages that require authentication but should not be localized

        });

        // Define other pages that should not require authentication or localization.



        Route::group(
            [
                'prefix' => LaravelLocalization::setLocale(),
                'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
            ], function(){
                // Import Jetstream Features routes
                require_once(__DIR__.'/jetstreamFeatures.php');
            });




