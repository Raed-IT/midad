<?php

namespace App\Http\Middleware;

use App\Models\Lang;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleArray
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locales = [];
        foreach (Lang::whereIsActive(true)->get() as $local) {
            $locales[$local->code] = [
                "name" => $local->name,
                "native" => $local->name
            ];
        }
        config(["filament-language-switch.locales" => $locales]);
        return $next($request);
    }
}
