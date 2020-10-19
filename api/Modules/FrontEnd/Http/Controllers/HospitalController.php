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
    public $models = [

        "hospital"           =>  "App\Hospital",     
        "doctor"             =>  "App\Doctor",     
    ];    

    public $resources = [
         "hospital"          => "Modules\FrontEnd\Transformers\HospitalListResource",   
         "doctor"            => "Modules\FrontEnd\Transformers\DoctorListResource",   
         "hospital_detail"   => "Modules\FrontEnd\Transformers\HospitalDetailResource",   
         "doctor_detail"     => "Modules\FrontEnd\Transformers\DoctorListResource",    // todo 
    ];

    public function index(Request $request)
    {
        // return "ok";

        $type        = $request->type == 'doctor' ? 'doctor' : 'hospital' ;
        $limit       = $request->has('limit')       ? $request->limit       : 10 ; 
        $division_id = $request->has('division_id') ? $request->division_id : null ;
        $district_id = $request->has('district_id') ? $request->district_id : null ;
        $upazila_id  = $request->has('upazila_id')  ? $request->upazila_id  : null ;
     
        // $hospitals = Hospital::when($division_id,function($q) use($division_id){$q->where('division_id','=',$division_id);})
        $hospitals = $this->models[ $type ]::when($division_id,function($q) use($division_id){$q->where('division_id','=',$division_id);})
                    ->when($district_id,function($q) use($district_id){$q->where('district_id','=',$district_id);})    
                    ->when($upazila_id,function($q) use($upazila_id){$q->where('upazila_id','=',$upazila_id);})    
                    ->where('is_active','=',1)
                    ->paginate($limit) ;
                    
        return  $this->resources[ $type ]::collection( $hospitals );
    }


    public function detail(Request $request) {
        
        $type     = $request->type == 'doctor' ? 'doctor' : 'hospital' ;
        $data = $this->models[ $type ]::find($request->id) ;
        return new $this->resources[ $type.'_detail' ]( $data ) ;
    }
}
