<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        $user = auth()->user();

        // Safety check
        if (!$user) {
            return redirect()->route('admin.login');
        }

        // Role mismatch
        if ($user->role !== $role) {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
