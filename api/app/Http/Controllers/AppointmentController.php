<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Hospital ;
use Illuminate\Http\Request;

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
        $role = auth()->user()->role->slug ;

        $auth_user = auth()->user() ;
     
        $appointments = [] ;

        if( $role == 'super_admin'){

            return  Appointment::paginate(10) ;

        }else if( $role == "hospital") {

            return $auth_user->hospital->appointments()->paginate(10) ;     
        
        }else if( $role == "doctor"){
           
            return $auth_user->doctor->appointments()->paginate(10) ;

        }else if( $role == "patient" ){

            return $auth_user->patient->appointments()->paginate(10) ;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $request->validate([
            'doctor_id' => 'required',
        ]);
        
        $auth_user = auth()->user() ;
        $role = auth()->user()->role->slug ; 

        if ( $role == "patient" ){
            return "appointment created";
        }
        return "who are you ?";

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
