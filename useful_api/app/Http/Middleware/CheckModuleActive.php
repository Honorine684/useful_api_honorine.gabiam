<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = Auth::id();
        $isActive = DB::table('user_modules')->where('user_id',$id)->where('module_id',$request)->pluck('active');
        if(!$isActive)
        {
            return response()->json(['message'=>'"Module inactive. Please activate this module to use it."']);
        }
        return $next($request);
    }
}
