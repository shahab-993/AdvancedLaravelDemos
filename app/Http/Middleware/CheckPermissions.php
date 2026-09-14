<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
       $user = Auth::user();
       $roleId= $user->role_id;

       $hasPermission= DB::table('role_wise_permissions')
       ->join('permissions','role_wise_permissions.permission_id','=','permissions.id')
       ->where('role_wise_permissions.role_id',$roleId)
       ->where('permissions.name',$permission)
       ->exists();
       if(!$hasPermission){
        return redirect()->back()->with('error','You do not have permission(s) to access  this page.');
       }
       return $next($request);
    }
}
