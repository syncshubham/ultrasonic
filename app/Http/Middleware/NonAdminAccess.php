<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Constants\RoleConstants;

class NonAdminAccess
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
        // Define the admin role constant
        $adminRole = RoleConstants::ADMIN;

        // Check if the user is logged in
        if (Auth::check()) {
            $retrievedEncryptedRole = Auth::user()->user_role_type;
            $decryptedRole = Crypt::decrypt($retrievedEncryptedRole);

            if ($adminRole == $decryptedRole) {
                return redirect('/admin/users/view');
            }
        }

        return $next($request);
    }
}

