<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Hospital ;
use Modules\FrontEnd\Transformers\HospitalListResource;
use Modules\FrontEnd\Transformers\DoctorListResource;
use Modules\FrontEnd\Transformers\HospitalDetailResource;
class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $models = [
            "hospital" =>  "App\Hospital",     
            "doctor" =>  "App\Doctor",     
        ];    

        $resources = [
             "hospital" => "Modules\FrontEnd\Transformers\HospitalListResource",   
             "doctor" => "Modules\FrontEnd\Transformers\DoctorListResource",   
        ];

        $type = $request->has('type') ? $request->type : 'hospital' ;
        $limit = $request->has('limit') ? $request->limit : 10 ; 
        $division_id = $request->has('division_id') ? $request->division_id : null ;
        $district_id = $request->has('district_id') ? $request->district_id : null ;
        $upazila_id = $request->has('upazila_id') ? $request->upazila_id : null ;
     
        // $hospitals = Hospital::when($division_id,function($q) use($division_id){$q->where('division_id','=',$division_id);})
        $hospitals = $models[$type]::when($division_id,function($q) use($division_id){$q->where('division_id','=',$division_id);})
                    ->when($district_id,function($q) use($district_id){$q->where('district_id','=',$district_id);})    
                    ->when($upazila_id,function($q) use($upazila_id){$q->where('upazila_id','=',$upazila_id);})    
                    ->paginate($limit) ;
                    
        return  $resources[$type]::collection( $hospitals );
    }


    public function detail($id) {

        $hospital = Hospital::find($id) ;
        return new HospitalDetailResource( $hospital ) ;
    }
}
