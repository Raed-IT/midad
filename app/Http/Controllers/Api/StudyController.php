<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetCourseRequest;
use App\Http\Resources\StudyResource;
use App\Models\Course;
use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetCourseRequest $request)
    {
        $studies = Course::with("studies")->find($request->course_id)->studies;
        return response()->json([
            "status" => "success",
            "studies" => StudyResource::collection($studies),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Study $study)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Study $study)
    {
        //
    }
}
