<?php

namespace App\Http\Middleware;

use Auth;
use App\User;
use Closure;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Constants\RoleConstants;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)    $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $adminRole = RoleConstants::ADMIN;
        $retrievedEncryptedRole = Auth::user()->user_role_type;
        $decryptedRole = Crypt::decrypt($retrievedEncryptedRole);

        if (Auth::user() &&  $adminRole == $decryptedRole) {

            return $next($request);
        }
        
        return redirect('/');
    }
}