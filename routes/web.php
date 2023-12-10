<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AdminController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checkRole:user'])->group(function () {
    Route::get('/', [CoursesController::class, 'index'])->name('courses');
    Route::get('/course/{id}', [CoursesController::class, 'getOneCourse'])->name('getOneCourse');
    Route::get('/mycourses', [CoursesController::class, 'myCourses'])->name('myCourses');
    Route::get('/language/{id}', [CoursesController::class, 'getCoursesByLanguage'])->name('getCoursesByLanguage');
    Route::post('/courses/{course}/enroll', [CoursesController::class, 'enroll'])->name('enroll');
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/language/{id}', [AdminController::class, 'getCoursesByLanguage'])->name('getCoursesByLanguage');
    Route::get('/createcourse', [AdminController::class, 'showCreateCourseForm'])->name('showCreateCourseForm');
    Route::post('/createcourse', [AdminController::class, 'createCourse'])->name('createCourse');
    Route::get('/deletecourse/{id}', [AdminController::class, 'deleteCourse'])->name('deleteCourse');
    Route::get('/enrollments/{id}', [AdminController::class, 'showEnrollments'])->name('showEnrollments');
    Route::get('/deleteEnrollment/{id}', [AdminController::class, 'deleteEnrollment'])->name('deleteEnrollment');
});
