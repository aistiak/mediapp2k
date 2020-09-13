<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    //
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
        return new $this->resource[$request->model]($record);
    }
}
