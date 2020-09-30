<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request){

    }

    public function store(Request $request){

    }

    public function destroy(Request $request){

    }

    public function refresh(Request $request) {
        
        $user = auth()->user() ;
        // patient 
        // if($user->role_id == 4) { 
        //     return $user->patient ;
        // }
        return $user ;    
    }
}
