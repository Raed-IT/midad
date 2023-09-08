<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
 use App\Http\Resources\CategoryResource;
use App\Http\Resources\PaginationResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $categories = Category::cursorPaginate();
        return response()->json([
            "status" => "success",
            "categories" => CategoryResource::collection($categories),
            "pagination" => new PaginationResource($categories),
        ]);
    }
}
