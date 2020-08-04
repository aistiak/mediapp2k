<?php

namespace App\Http\Middleware;

use Closure;

use Sentinel;
use App\RoleUser;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        
        
        $prefix = $request->route()->getPrefix();
        $prefix = substr($prefix, 1);
        
        $user_id = Auth()->user()->id;
        
        $role_id =  Auth()->user()->role->id ;
        
        
        $role = Sentinel::findRoleById($role_id);

        $models = [

                  "hospital" =>  "App\Hospital",     
                  "doctor" =>  "App\Doctor",     
        ];

        $request_field = $prefix.'_id';
        

        if ($request->isMethod('post')) {
            if ($role->hasAccess([$prefix.'.create']))
            {
                return $next($request);
            }
            else{
                return response()->json(['error'=>"You have no access"],400);
            }
        }
        elseif ($request->isMethod('get')) {
            if (  $role->hasAccess([$prefix.'.view']) || $role->hasAccess([$prefix.'.viewall'])  )
            {
                return $next($request);
            }
            else{
                return response()->json(['error'=>"You have no access"],400);
            }
        }
        elseif ($request->isMethod('put')) {
            $data = $models[$prefix]::find($request->$request_field);
            $created_by = $data->created_by;
            if($created_by == $user_id){
                
                if($role->hasAccess([$prefix.'.updateall']))
                {
                    return $next($request);
                }
                elseif($role->hasAccess([$prefix.'.update']))
                {
                    return $next($request);
                }
                else{
                    return response()->json(['error'=>"You have no access"],400);
                }
            }else{
                
                if ($role->hasAccess([$prefix.'.updateall']))
                {
                    return $next($request);
                }
                else{
                    return response()->json(['error'=>"You have no access"],400);
                }
            }
            
           
        }
        elseif ($request->isMethod('delete')) {
            $id = $request->route('id');
            if($prefix == 'contact'){
                $data = $models[$prefix]::where('user_id',$id)->first();
            }
            else{
                $data = $models[$prefix]::find($id);
            }
            $created_by = $data->created_by;
            if($created_by == $user_id){
                if($role->hasAccess([$prefix.'.deleteall']))
                {
                    return $next($request);
                }
                elseif($role->hasAccess([$prefix.'.delete']))
                {
                    return $next($request);
                }
                else{
                    return response()->json(['error'=>"You have no access"],400);
                }
            }else{
                
                if ($role->hasAccess([$prefix.'.deleteall']))
                {
                    return $next($request);
                }
                else{
                    return response()->json(['error'=>"You have no access"],400);
                }
            }
        }
    }
}
