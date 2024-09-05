<?php

use App\Models\Admin;
// use StudentAuth\StudentLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudCourseController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\StcoursematerialController;
use App\Http\Controllers\StudAuth\StudLoginController;
use App\Http\Controllers\AdminAuth\AdminLoginController;
use App\Http\Controllers\StudAuth\StudRegisterController;
use App\Http\Controllers\AdminAuth\AdminRegisterController;
use App\Http\Controllers\StudentAuth\StudentLoginController;
use App\Http\Controllers\StudentAuth\StudentRegisterController;


// use App\Http\Controllers\StudentLoginController;
// use App\Http\Controllers\AdminAuth\ForgotPasswordController;
// use App\Http\Controllers\AdminAuth\ResetPasswordController;
// use App\Http\Controllers\AdminAuth\RegisterController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication Routes
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('register', [AdminRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AdminRegisterController::class, 'register'])->name('register');

    // Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    // Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


});
// Route::get('admindashboard', [AdminController::class, 'index'])->name('admindashboard');

// Student authentication routes
Route::prefix('stud')->name('stud.')->group(function () {
    Route::get('login', [StudLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [StudLoginController::class, 'login'])/*->middleware('auth:student')*/;
    Route::get('logout', [StudLoginController::class, 'logout'])->name('logout');

    // Route::get('register', [StudRegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('register', [StudRegisterController::class, 'register']);

        Route::get('register', [StudRegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [StudRegisterController::class, 'register']);



});




Route::get('/', function () {
    return view('student.auth.login');
});

Route::get('/stdashboard', [StudentController::class, 'index'])->name('stdashboard')->middleware(['auth:student']);
Route::get('/admindashboard', [AdminController::class, 'index'])->name('admindashboard')->middleware(['auth:admin']);
    // return view('Student.dashboard');
// })->middleware(['auth:student'])->name('studdashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('/assignment', AssignmentController::class);
Route::resource('/course', CourseController::class);

Route::resource('/lec/course', CourseController::class, ['only' => ['index']]);


Route::resource('/stud/course', StudCourseController::class, ['only' => ['index']]);
Route::resource('/stud/coursematerial', StcoursematerialController::class, ['only' => ['index']]);

Route::resource('/department', DepartmentController::class)->middleware(['auth:admin']);
Route::resource('/exam', ExamController::class)->middleware(['auth:admin']);
Route::resource('/lecturer', LecturerController::class)->middleware(['auth:admin']);
Route::resource('/program', ProgramController::class)->middleware(['auth:admin']);
Route::resource('/student', StudentController::class);
Route::resource('/coursematerial', CourseMaterialController::class)->middleware(['auth:admin']);

require __DIR__.'/auth.php';
