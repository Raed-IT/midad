<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\PaginationResource;
use App\Models\Course;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::cursorPaginate();
        return \response()->json([
            "status" => "success",
            "courses" => CourseResource::collection($courses),
            "pagination"=>new PaginationResource($courses)
        ]);
    }

    public function myCourses()
    {
        $courses = Course::whereHas("users",
            fn($q) => $q->whereUserId(auth()->user()->id)
        )->cursorPaginate();
        return \response()->json([
            "status" => "success",
            "courses" => CourseResource::collection($courses),
            "pagination"=>new PaginationResource($courses)
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
