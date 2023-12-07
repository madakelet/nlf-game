<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            return response()->json([
                'message' => 'Nincs jogosultságod a művelet végrehajtásához.',
            ], Response::HTTP_FORBIDDEN);
        } else if ($request->user()->is_admin) {
            return $next($request);
        } else {
            return response()->json([
                'message' => 'Nincs jogosultságod a művelet végrehajtásához.',
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
