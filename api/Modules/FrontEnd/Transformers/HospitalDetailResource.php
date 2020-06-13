<?php

namespace Modules\FrontEnd\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\FrontEnd\Transformers\DoctorListResource;

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
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'address' => $this->address , 
            'doctors' =>  DoctorListResource::collection( $this->doctors ) 
        ];
    }
}
