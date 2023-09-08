<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequst;
use App\Http\Resources\UserResource;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt($request->validated())) {
            return \response()->json([
                "status" => "error",
                "msg" => "unauthorized .... ",
            ]);
        }
        // user authorized
        $user = User::whereEmail($request->email)->first();
        return \response()->json([
            'status' => "success",
            "user" => new UserResource($user),
            "token" => $user->createToken("api", ['user'])->plainTextToken
        ]);
    }

    public function register(RegisterRequst $request)
    {
        $user = User::create($request->validated());
        return \response()->json([
            'status' => "success",
            "user" => new UserResource($user),
            "token" => $user->createToken("api", ['user'])->plainTextToken
        ]);
    }
}
