<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Resources\Doctor as DoctorResource ;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // if has specific id then send detail

        if($request->has('id')){
            if(Doctor::find($request->input('id'))){
                return Doctor::with('appointment_setting')->find($request->input('id'));
            }else{
                return response()->json(['error' => 'record not found'],404);
            }
        }       
        // only super use can view hospitals 
        // so will return all hospitals 
        // send all since all data will be sent has to be light
        $limit = $request->has('limit') ? $request->limit : 10 ; 

        $user = auth()->user() ;
        
        $role = $user->role->slug ;
        
        $filter_type = $request->has('filter_type') ? $request->filter_type : 'none' ;

        if( $role == "super_admin"){
            // all the doctos 
            // $doctors =  Doctor::paginate($limit)  ;
            $doctors =    Doctor::when($filter_type == 'none',function($q) {  return $q ;})
                          ->when($filter_type == 'active',function($q) { return $q->where('is_active','=',1) ; })  
                          ->when($filter_type == 'deactive',function($q) { return $q->where('is_active','=',0) ; })  
                          ->when($filter_type == 'requested',function($q) { return $q->where('is_enable','=',0) ; })  
                          ->paginate($limit) ;         
            return  DoctorResource::collection( $doctors );
        
        }else if( $role == "hospital") {
            // all doctors related to that hospital
        
            // $doctors = $user->hospital->doctors()->paginate($limit) ;
            $doctors =  $user->hospital->doctors()->when($filter_type == 'none',function($q) {  return $q ;})
                          ->when($filter_type == 'active',function($q) { return $q->where('is_active','=',1) ; })  
                          ->when($filter_type == 'deactive',function($q) { return $q->where('is_active','=',0) ; })  
                          ->when($filter_type == 'requested',function($q) { return $q->where('is_enable','=',0) ; })  
                          ->paginate($limit) ; 
        
            return  DoctorResource::collection( $doctors ) ;
        
        }
        // else if ($role == "doctor "){

        //     $doctors =    $user->doctor    
        //                   ->when($filter_type == 'active',function($q) { return $q->where('is_active','=',1) ; })  
        //                   ->when($filter_type == 'deactive',function($q) { return $q->where('is_active','=',0) ; })  
        //                   ->when($filter_type == 'requested',function($q) { return $q->where('is_enable','=',0) ; })  
        //                   ->paginate($limit) ;
        
        //     return  DoctorResource::collection( $doctors ) ;
        // }
        

        return response()->json(['error' => 'access denied ']) ;
    }

   



   public function toggleStatus($id){

        $role = auth()->user()->role->slug ;
        $doctor = Doctor::find($id) ;
         
        // if super admin change status     
        if( $role == "super_admin"){
       
            $doctor->is_active = !$doctor->is_active * 1 ;
            $doctor->save() ;
            $doctor->user->activation->update(['completed' => !$doctor->user->activation->completed * 1]);
            return response()->json(['success' => 'status updated '],200) ;
       
        }else if( $role == "hospital" && $doctor->hospital_id == auth()->user()->hospital->id ){  // if hospital then match doctors hospital id
       
            // check if hospital has the access 
            $doctor->is_active = !$doctor->is_active * 1 ;
            $doctor->save() ;
            $doctor->user->activation->update(['completed' => !$doctor->user->activation->completed * 1]);
            return response()->json(['success' => 'status updated '],200) ;
       
        }
       
        return response()->json(['error' => 'access denied !!']) ;
   }

   


   public function approve($id){
       // role has to be super_admin or parent hospital 
       $role = auth()->user()->role->slug ; 
       $doctor = Doctor::find($id) ;

       if(   
             $role == "super_admin"  || 
           ( $role == "hospital"  &&  auth()->user()->hospital->id == $doctor->hospital_id )  
         )
         {
             $doctor->user->activation->update(['completed' => 1]) ;
             $doctor->update(['is_active' => 1 , 'is_enable' => 1]);  ;
           return response()->json(['success' => 'doctor approved']) ;
    
         }
         
         return response()->json(['error' => 'access denied !!']) ;
    }

   



}
