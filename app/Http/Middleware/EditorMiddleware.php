<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class EditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Proverava da li je korisnik logovan i da li ima ulogu "editor"
         if (Auth::check() && Auth::user()->role == 'editor') {
            return $next($request);  // Ako je editor, dozvoljava dalje
        }

        // Ako korisnik nije editor, preusmerava ga na početnu stranu
        return redirect('/')->with('error', 'Nemate pristup ovoj stranici.');
    }
}
