<?php

namespace App\Http\Controllers;
use App\AppointmentSetting ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentSettingController extends Controller
{
    //

    public function detail ( Request $request ) { 

        return Auth()->user()->doctor->appointment_setting ;
    }

    public function store ( Request $request ){
        // return " stroe " ;

        // get the doctoer associated with auth user 
        $appointment_setting = $request->has('id') ? AppointmentSetting::find($request->input('id'))  : new AppointmentSetting ;
        $appointment_setting->is_monthly =  $request->input('is_monthly') ? $request->is_monthly : false ; 
        $appointment_setting->is_weekly  =  $request->input('is_weekly')  ? $request->is_weekly  : false ; 
        $appointment_setting->is_morning =  $request->input('is_morning') ? $request->is_morning : false ; 
        $appointment_setting->is_evening =  $request->input('is_evening') ? $request->is_evening : false ; 
        $appointment_setting->monthly    =  json_encode( $request->input('monthly') ? $request->input('monthly') : [] );
        $appointment_setting->morning    =  json_encode( $request->input('morning') );
        $appointment_setting->evening    =  json_encode( $request->input('evening') );
        $appointment_setting->weekly     =  json_encode( $request->input('weekly')  ? $request->input('weekly') : [] );

        $appointment_setting->save();

        return $appointment_setting ;
    }

    public function destroy( $id ){
        // has to get autometicall deleted when doctor is deleted 
        return " delete " ;
    }
}
