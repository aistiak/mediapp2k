<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function detail(Request $request) {
        // get auth user 
        $user = auth()->user() ;
        // return $user->role;
        // get his role 
        $role = $user->role->slug ;
        // get detail by role
        if( $role == 'hospital') {
            return $user->hospital ;
        }else if( $role == 'doctor'){
            return $user->doctor ;
        }else if( $role == 'super_admin'){
            return $user ;
        }
    }

    public function store(Request $request){
        
        $role = auth()->user()->role->slug ;

        if($role == 'hospital'){
            $hospital = auth()->user()->hospital ;
            $hospital->name = $request->name ;
            $hospital->address = $request->address ;
            $hospital->phone_no = $request->phone_no ;
            // $hospital->name = $request->name ;
            $hospital->save() ;
            return $hospital ;

        }else if( $role == 'doctor') {
            return $role ;

        }else if($role == 'super_admin' ){
            return $role ;
        }

        return  "store";
    }

    public function security(Request $request){
        $id = auth()->user()->id ;
        \App\User::find($id)->update(['password' => bcrypt($request->input('password')) ]) ;
        // $user->password = bcrypt( $request->input('password')) ;
        return response()->json(['success',200]) ;
    }   
}
