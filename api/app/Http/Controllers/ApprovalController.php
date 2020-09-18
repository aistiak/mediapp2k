<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    // first time activate $is_activate = $is_enable =1 , activatioins->completed = 1
    // disable $is_enable = 0 , activatioins->completed = 0
    // enable $is_enable = 1 , activatioins->completed = 1
    public $model = [ 
        'patient' => '\App\Patient'
    ] ;
    public $resource = [
        'patient' => 'App\Http\Resources\PatientResource'
    ] ;
    public function approve(Request $request) {
        // check if is SU
        // get model type 
        // get id 
        // approve 
        // return "go" ;
        $record = $this->model[$request->model]::find($request->id) ;
        $record->update(['is_active' => 1]);
        $record->update(['is_enable' => 1]);
        $record->user->activation->update(['completed' => 1]) ;
        return new $this->resource[$request->model]($record);
    }

    public function toggleEnable(Request $request){

        // check permission 
        $request->validate([
            'model' => 'required' ,
            'id'    => 'required' ,
        ]);

        $record = $this->model[$request->model]::find($request->id) ;
        $record->update(['is_enable' => !$record->is_enable]) ;
        $record->user->activation->update(['completed' => !$record->user->activation->completed]) ;
        return new $this->resource[$request->model]($record);
    }
}
