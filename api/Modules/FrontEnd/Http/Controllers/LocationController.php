<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Division;
use App\District;
use App\Upazila;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $division_id = $request->has('division_id') ? $request->division_id : null ;
        $district_id = $request->has('district_id') ? $request->district_id : null ;
        // $upazila_id  = $request->has('upazila_id');
        $divisions = Division::all() ;

        if($division_id)
            $districts  = District::when($division_id,function($q)use($division_id){$q->where('geo_division_id','=',$division_id);})->get();
        else 
            $districts  = [];

        if($district_id)
            $upazilas   = Upazila::when($district_id,function($q)use($district_id){$q->where('geo_district_id','=',$district_id);})->get();
        else 
            $upazilas   = [];

        $response       = [
            "divisions"  => $divisions ,
            "districts" => $districts ,
            "upazilas"  => $upazilas  ,

        ] ;
        return response()->json(['data' => $response],200);
        // return "location ok";
    }

}
