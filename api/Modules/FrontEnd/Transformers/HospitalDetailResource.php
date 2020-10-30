<?php

namespace Modules\FrontEnd\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\FrontEnd\Transformers\DoctorListResource;
use App\Http\Resources\MediaResource ;
use Exception;

class HospitalDetailResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $avater = "" ;
        try{
            $avater = new MediaResource($this->user->media) ;
        }catch(Exception $e){}

        return [
            
            'id' => $this->id ,
            'name' => $this->name ,
            'about' => $this->about ,
            'address' => $this->address , 
            'avater' => $avater ,
            'doctors' =>  DoctorListResource::collection( $this->doctors ) ,
            'sliders' =>  MediaResource::collection( \App\Media::find(  json_decode( $this->slider_ids  ) ) ) 
        ];
    }
}
