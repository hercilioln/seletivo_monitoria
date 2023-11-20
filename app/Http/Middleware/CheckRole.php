<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Use os métodos isAdmin ou isAluno conforme necessário
        if ($role === 'admin' && !$request->user()->isAdmin()) {
            abort(403, 'Acesso não autorizado.');
        }

        if ($role === 'aluno' && !$request->user()->isAluno()) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
