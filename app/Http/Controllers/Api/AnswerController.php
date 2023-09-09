<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\GetAnswersRequest;
use App\Http\Resources\AnswerResource;
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
        ])->find($request->task_id)->answers;
        return \response()->json([
            "status" => "success",
            "answers" => AnswerResource::collection($answers),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAnswerRequest $request)
    {
        $answer = Answer::create([
            "task_id" => $request->get("task_id"),
            "user_id" => auth()->id(),
            "info" => $request->get("info"),
        ]);
        if ($request->image) {
            $answer->clearMediaCollection("image");
            $answer->addMediaToModel($request->image);
        }
        return response()->json([
            "status" => "success",
            "answer" => new AnswerResource($answer),
        ]);
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
