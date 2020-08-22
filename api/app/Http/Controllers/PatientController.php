<?php

namespace App\Http\Controllers;
use App\Http\Resources\PatientResource;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    function index(Request $request) {
        $patients = PatientResource::collection( \App\Patient::paginate(10) );
        return $patients ;
    }
}
