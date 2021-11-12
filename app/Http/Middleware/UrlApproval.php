<?php

namespace App\Http\Middleware;

use App\Models\agents;
use Closure;
use Illuminate\Http\Request;

class UrlApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(agents::where(["user_id" => auth()->id(),'role_id' => 1])->count() > 0){
            return $next($request);
        }
        return redirect('home')->with('error',"You Dont Have Access!");
    }
}
