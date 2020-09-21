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
        return "store" ;
    }
}
