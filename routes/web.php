<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseMaterialController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('/assignment', AssignmentController::class);
Route::resource('/course', CourseController::class);
Route::resource('/department', DepartmentController::class);
Route::resource('/exam', ExamController::class);
Route::resource('/lecturer', LecturerController::class);
Route::resource('/program', ProgramController::class);
Route::resource('/student', StudentController::class);
Route::resource('/coursematerial', CourseMaterialController::class);

require __DIR__.'/auth.php';
