<?php

use App\Enums\GenderEnum;
use App\Enums\UserTypeEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CourseController;
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
Route::get('/languages/{lang}', [IndexController::class, 'change_lang'])->name('change.lang');

Route::get('/',[IndexController::class,'index'])->name('index_page');
Route::get('/courses',[IndexController::class,'showCourses'])->name('show_courses');
Route::get('/course/{data}',[CourseController::class,'show'])->name('course_details');
Route::get('/login',[IndexController::class,'login'])->name('login');
Route::get('/register',[IndexController::class,'register'])->name('register');
Route::get('/profile/{data}',[IndexController::class,'profile'])->name('profile');

