<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->has('logged_in')) {
            $routeName = $request->route() ? $request->route()->getName() : '';
            
            $message = 'You must be logged in to access this page.';
            
            if (in_array($routeName, ['recipes.create', 'recipes.store'])) {
                $message = 'You must be logged in to create a recipe.';
            } elseif (in_array($routeName, ['recipes.edit', 'recipes.update'])) {
                $message = 'You must be logged in to update a recipe.';
            } elseif ($routeName === 'recipes.destroy') {
                $message = 'You must be logged in to delete a recipe.';
            }

            return redirect()->route('recipes.index')
                ->with('error', $message);
        }

        return $next($request);
    }
}
