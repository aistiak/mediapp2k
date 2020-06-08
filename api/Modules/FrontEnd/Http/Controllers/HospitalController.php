<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Hospital ;
use Modules\FrontEnd\Transformers\HospitalListResource;
use Modules\FrontEnd\Transformers\HospitalDetailResource;
class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $hospitals = Hospital::paginate(10) ;
        return  HospitalListResource::collection( $hospitals );
    }
    public function detail($id){

        $hospital = Hospital::find($id) ;
        return new HospitalDetailResource( $hospital ) ;
    }
}
