<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $allowedRoles = explode('|', $role);

        if (!in_array(auth()->user()->role, $allowedRoles)) {
            abort(403, 'Acesso não autorizado');
        }

        return $next($request);
    }
}
