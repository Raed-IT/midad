<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetAnswersRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\PaginationResource;
use App\Models\Answer;
use App\Models\Study;
use App\Models\Task;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetAnswersRequest $request)
    {
        $answers = Task::with([
            "answers" => function ($q) {
                $q->whereUserId(auth()->id());
            }
        ])->find($request->task_id)->answers()->cursorPaginate();
        return \response()->json([
            "status" => "success",
            "answers" => CourseResource::collection($answers),
            "pagination" => new PaginationResource($answers)
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
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
