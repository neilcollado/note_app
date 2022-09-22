<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('user');
        $user = User::find($id);

        if($user) {
            if($user->id == Auth::id()) {
                return $next($request);
            } else {
                return redirect(route('users.edit', Auth::id()));
            }
        } else {
            return redirect(route('users.edit', Auth::id()));
        }  
    }
}
