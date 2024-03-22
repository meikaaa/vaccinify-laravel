<?php

namespace App\Http\Middleware;

use App\Models\Society;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $society = Society::where('login_tokens', $request->token)->first();
        if(!$society && !$request->token){
            return response()->json([
                'message' => 'UNAUTHORIZED AUTHOR'
            ], 401);
        }
        return $next($request);
    }
}
