<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $req, Closure $next): Response
    {
            
        if (auth()->guard("admin")->attempt($req->all("email","password"))) {
            return redirect()->intended("/admins");
        }
         elseif (auth()->guard("formateur")->attempt($req->all("email","password"))) {
            return redirect()->intended("/formateurs");
        }
        elseif (auth()->guard("stagiaire")->attempt($req->all("email","password"))) {
            return redirect()->intended("/students");
        }
        else {
            return redirect()->back()->with("FAILED" , "Your Credentials doesnt match our records");
        }
    }
}
