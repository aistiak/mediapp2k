<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Doctor ;
use App\Http\Resources\Hospital as HospitalResource ;
use Exception;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if has specific id then send detail
        if(auth()->user()->role->slug != "super_admin")
            return response()->json(['error' => 'you don`t gave access ']);

        if($request->has('id')){
            if(Hospital::find($request->input('id'))){
                return Hospital::find($request->input('id'));
            }else{
                return response()->json(['error' => 'record not found'],404);
            }
        }
        $limit = $request->has('limit') ? $request->limit : 5;       
        // only super use can view hospitals 
        // so will return all hospitals 
        // send all since all data will be sent has to be light 
        $filter_type = $request->has('filter_type') ? $request->filter_type : 'none' ;
        $hospitals =  Hospital::when($filter_type == 'none',function($q) {  return $q ;})
                      ->when($filter_type == 'active',function($q) { return $q->where('is_active','=',1) ; })  
                      ->when($filter_type == 'deactive',function($q) { return $q->where('is_active','=',0) ; })  
                      ->when($filter_type == 'requested',function($q) { return $q->where('is_enable','=',0) ; })  
                      ->paginate($limit) ; 



        return HospitalResource::collection( $hospitals);
    }

    function approve($id) {

        if(auth()->user()->role->slug != "super_admin")
            return response()->json(['error' => 'you don`t gave access ']);
        Hospital::find($id)->update(['is_enable' => 1]) ;
        $hospital = Hospital::find($id) ;
        // activate associated user
        $hospital->user->activation->update(['completed' => 1]);
        return response()->json(['success' => 'request approved']) ;    
    }

    function toggleStatus($id) {

        if(auth()->user()->role->slug != "super_admin")
            return response()->json(['error' => 'you don`t gave access ']);

        try{
            $hospital = Hospital::find($id) ; 
            $hospital->is_active = !$hospital->is_active  * 1;
            $hospital->save() ;
            $hospital->user->activation->update(['completed' => !$hospital->user->activation->completed * 1]);
            return response()->json(['success' => 'status updated '],200) ;
        }catch(Exception $e) {
            return response()->json(['error' => 'something went wrong'],400) ;
        }
    }

    function addDoctor(Request $request){

        $request->validate([
            'name' => 'required' ,
            'title' => 'required' ,
            'email' => 'required:users' ,
            'phone_no' => 'required' ,
            'password' => 'required' ,
            'password2' => 'required' ,
        ]);

        $auth_user = auth()->user() ;

        if($auth_user->role->slug != 'hospital'){
            return response()->json(['errors'=>['auth'=> 'you are not hospital']]);
        }       
            
        // get hospital id , 
        $user = \App\User::create([

            'name' => $request->name , 
            'email'=> $request->email ,
            'role_id' => 3 ,
            'password' => bcrypt($request->password) ,


        ]);

        $user->activation->update(['completed' => 1]) ;     
        // create user      
        $doctor = Doctor::create([

            'user_id' => $user->id ,
            'name' => '' ,
            'title' => '' ,
            'hospital_id' => $auth_user->id ,
            'is_active' => 1 ,
            'is_enable' => 1 ,
        ]);
        // create doctor
        
        return $doctor ;
            
    }


}
