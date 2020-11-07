<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Hospital ;
use Exception;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // if super admin whill show all the appointments 
        //    doctor  can only see his appointments
        //    hospital  all the appointmens of the hospital doctos
        //    patient can see his appointments 
        // get the auth user , see type / role and retuen appointments 
        // return \App\Doctor::first()->appointments ;
        $role = auth()->user()->role->slug ;
        $auth_user = auth()->user() ;
        $appointments = [] ;
        
        if( $role == 'super_admin'){

            return  Appointment::paginate(10) ;

        }else if( $role == "hospital") {
            
            return  AppointmentResource::collection($auth_user->hospital->appointments()->paginate(10));     
        
        }else if( $role == "doctor"){
           
            return AppointmentResource::collection($auth_user->doctor->appointments()->paginate(10)) ;

        }else if( $role == "patient" ){

            return  AppointmentResource::collection($auth_user->appointments()->paginate(10)) ;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request){

        $request->validate([
            'approve' => 'required' ,
            'appointment_id' => 'required' ,
        ]);

        $approve = $request->input('approve') == 0 ? 0 : 1 ;

        
        
        if($appointment = \App\Appointment::find($request->input('appointment_id'))){
            try {
                
                $role = auth()->user()->role->slug ;

                if( $role == 'hospital')
                    $doctor = auth()->user()->hospital->appointments->find( $request->appointment_id )->doctor; 
                else
                    $doctor = auth()->user()->doctor;
                
                if( $appointment->doctor_id != $doctor->id)  return response()->json(['error' => 'not your appointment doctor !'],400) ;

                $appointment->approved = $request->input('approve');  
                // $appointment->approve_by
                $appointment->save() ;
                
                return response()->json(['data' =>  $appointment->approved  ]);  
            
             }catch(Exception $e) { return response()->json(['error' => 'not a doctor / hospital '],400);  }

        }else{

            return response()->json(['error' => 'appointment not found'],404) ;
        }

    } 
    public function create(Request $request)
    {
        //
        $request->validate([
            'doctor_id' => 'required',
            'type' => 'required' ,
            'date' => 'required' 
        ]);

        
        $auth_user = auth()->user() ;
        $role = auth()->user()->role->slug ; 

        if ( $role == "patient" ) {
            // return "appointment created";
            $appointment                = new \App\Appointment ;
            $appointment->user_id       = $auth_user->id ;
            $appointment->doctor_id     = $request->input('doctor_id');
            $appointment->hospital_id   = \App\Doctor::find($request->input('doctor_id'))->hospital->id ;
            $appointment->date          = \Carbon\Carbon::parse(  $request->input('date')) ;
            $appointment->type          = $request->input('type') ;

            if( $appointment->save() ){
                return response()->json(['data' => $appointment]);
            }

        }

        return response()->json(['error' => 'you are not a valid user'],400);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }




    public function destroy(Appointment $appointment)
    {
        //
        return "this is delete" ;
    }
}
