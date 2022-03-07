<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckThemeManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userRolesRows = DB::table("role_user")->where("user_id", "=", Auth::id())->get();

        if($userRolesRows !== null)
        {
            foreach($userRolesRows as $row)
            {
                if($row->role_id == 3)
                {
                    return $next($request);
                }
            }
        }

        return redirect()->back()->with(['message' => 'Access denied: Theme Manager Only', 'alert' => 'alert-danger']);
    }
}
