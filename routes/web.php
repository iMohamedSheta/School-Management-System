
<?php

// Import the necessary classes and libraries

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;
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


//Jetstream import for routes
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\RegisteredUserController as ControllersRegisteredUserController;
use App\Http\Livewire\PostComponent;
use App\Http\Livewire\PostShow;
use App\Http\Livewire\StudentsTable;

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
                            Route::put('classrooms', [FormRepeater::class, 'store'])->name('classroom.store');
                            Route::post('classrooms', [ClassroomController::class, 'filterGrades'])->name('classroom.filter');
                            Route::put('classrooms/{id}', [ClassroomController::class, 'update'])->name('classroom.update');
                            Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('classroom.destroy');
                            Route::delete('classrooms', [ClassroomController::class, 'deleteSelected'])->name('classroom.deleteselected');
                        });

                        //Create User Page Routes
                        Route::get('users/add',fn()=>view('addusers'))->name('users.add');
                        Route::get('/parents/search', [SearchController::class, 'searchParents'])->name('parents.search');


                        //Students Page Routes
                        Route::get('students',[StudentController::class,"index"])->name('students.index');
                        Route::get('student/information/{id}',[StudentController::class,"studentInfoView"])->name('student.info');
                        Route::get('student/edit/{id}',[StudentController::class,"studentInfoEditView"])->name('student.edit');
                        Route::get('student/email/edit/{id}',[StudentController::class,"studentEmailEditView"])->name('student.email.edit');
                        Route::delete('student/delete',[StudentController::class,"destroy"])->name('student.destroy');
                        Route::delete('students/delete',[StudentController::class,"deleteSelected"])->name('students.selected.destroy');


                        //Teachers Page Routes
                        Route::get('teachers',[TeacherController::class,'index'])->name('teachers.index');
                        Route::get('teacher/information/{id}',[TeacherController::class,"teacherInfoView"])->name('teacher.info');
                        Route::get('teacher/edit/{id}',[TeacherController::class,"teacherInfoEditView"])->name('teacher.edit');
                        Route::get('teacher/email/edit/{id}',[TeacherController::class,"teacherEmailEditView"])->name('teacher.email.edit');
                        Route::delete('teacher/delete',[TeacherController::class,"destroy"])->name('teacher.destroy');
                        Route::delete('teachers/delete',[TeacherController::class,"deleteSelected"])->name('teachers.selected.destroy');


                        //Parents Page Routes
                        Route::get('parents',[ParentController::class,'index'])->name('parents.index');
                        Route::get('parent/information/{id}',[ParentController::class,"parentInfoView"])->name('parent.info');
                        Route::get('parent/edit/{id}',[ParentController::class,"parentInfoEditView"])->name('parent.edit');
                        Route::get('parent/email/edit/{id}',[ParentController::class,"parentEmailEditView"])->name('parent.email.edit');

                        Route::delete('parent/delete',[ParentController::class,"destroy"])->name('parent.destroy');
                        Route::delete('parents/delete',[ParentController::class,"deleteSelected"])->name('parents.selected.destroy');



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
                    Route::post('posts/save',[PostComponent::class,'savePost'])->name('posts.save');
                    Route::delete('post/delete',[PostController::class,'destroy'])->name('posts.destroy');
                    Route::get('post/{id}',[PostController::class,'index'])->name('post.show');
                    Route::delete('notification/read',[NotificationController::class,'removeNewCommmentNotification'])->name('notificationNewComment.remove');


                });


            // Define other pages that require authentication but should not be localized

        });

        // Define other pages that should not require authentication or localization.












        //Jetstream Routes

        Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
            $enableViews = config('fortify.views', true);

            // Authentication...
            if ($enableViews) {
                Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                    ->middleware(['guest:'.config('fortify.guard')])
                    ->name('login');
            }

            $limiter = config('fortify.limiters.login');
            $twoFactorLimiter = config('fortify.limiters.two-factor');
            $verificationLimiter = config('fortify.limiters.verification', '6,1');

            Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware(array_filter([
                    'guest:'.config('fortify.guard'),
                    $limiter ? 'throttle:'.$limiter : null,
                ]));

            Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

            // Password Reset...
            if (Features::enabled(Features::resetPasswords())) {
                if ($enableViews) {
                    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                        ->middleware(['guest:'.config('fortify.guard')])
                        ->name('password.request');

                    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                        ->middleware(['guest:'.config('fortify.guard')])
                        ->name('password.reset');
                }

                Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->middleware(['guest:'.config('fortify.guard')])
                    ->name('password.email');

                Route::post('/reset-password', [NewPasswordController::class, 'store'])
                    ->middleware(['guest:'.config('fortify.guard')])
                    ->name('password.update');
            }



            // Email Verification...
            if (Features::enabled(Features::emailVerification())) {
                if ($enableViews) {
                    Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
                        ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
                        ->name('verification.notice');
                }

                Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed', 'throttle:'.$verificationLimiter])
                    ->name('verification.verify');

                Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'throttle:'.$verificationLimiter])
                    ->name('verification.send');
            }

            // Profile Information...
            if (Features::enabled(Features::updateProfileInformation())) {
                Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
                    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
                    ->name('user-profile-information.update');
            }

            // Passwords...
            if (Features::enabled(Features::updatePasswords())) {
                Route::put('/user/password', [PasswordController::class, 'update'])
                    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
                    ->name('user-password.update');
            }

            // Password Confirmation...
            if ($enableViews) {
                Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);
            }

            Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
                ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
                ->name('password.confirmation');

            Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
                ->name('password.confirm');

            // Two Factor Authentication...
            if (Features::enabled(Features::twoFactorAuthentication())) {
                if ($enableViews) {
                    Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
                        ->middleware(['guest:'.config('fortify.guard')])
                        ->name('two-factor.login');
                }

                Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
                    ->middleware(array_filter([
                        'guest:'.config('fortify.guard'),
                        $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
                    ]));

                $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
                    ? [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm']
                    : [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')];

                Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.enable');

                Route::post('/user/confirmed-two-factor-authentication', [ConfirmedTwoFactorAuthenticationController::class, 'store'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.confirm');

                Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.disable');

                Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.qr-code');

                Route::get('/user/two-factor-secret-key', [TwoFactorSecretKeyController::class, 'show'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.secret-key');

                Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.recovery-codes');

                Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
                    ->middleware($twoFactorMiddleware);
            }
        });
