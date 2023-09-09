<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("guest")->prefix("auth")->group(function () {
    Route::post("/login", [\App\Http\Controllers\Api\AuthController::class, "login"]);
    Route::post("/register", [\App\Http\Controllers\Api\AuthController::class, "register"]);
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("/my-courses",[\App\Http\Controllers\Api\CourseController::class,"myCourses"]);
    Route::resource('/categories', \App\Http\Controllers\Api\CategoryController::class)->only("index");
    Route::resource('/courses', \App\Http\Controllers\Api\CourseController::class)->only("index");
    Route::resource('/studies', \App\Http\Controllers\Api\StudyController::class)->only("index");
    Route::resource('/answers', \App\Http\Controllers\Api\AnswerController::class)->only("index","store");
});

