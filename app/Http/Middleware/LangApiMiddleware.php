<?php

namespace App\Http\Middleware;

use App\Models\Lang;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LangApiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->get("local"), Lang::all()->pluck("code")->toArray())) {
            app()->setLocale($request->get("local"));
        } else {
            return response()->json(
                [
                    "status" => "error",
                    "msg" => "enter correct lang code .."
                ]
            );
        }
        return $next($request);
    }
}
