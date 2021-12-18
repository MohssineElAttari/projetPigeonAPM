<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckActive
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
        // dd($request);
        $user = Auth::id();
        $check=User::find($user)->active==0;
        if ($check) {
            Auth::logout();
            $request->session()->regenerateToken();
            $request->session()->invalidate();
            // session()->flash('error','your Message');
            return redirect()->route('login')->with('notActive', 'Votre compte n\'a pas encore été activé. Merci de votre compréhension');;
        }
        return $next($request);
    }
}
