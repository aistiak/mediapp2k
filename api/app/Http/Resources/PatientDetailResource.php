<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $media = null ;
        
        try {
            $media = new MediaResource( $this->media ) ;
        } catch(\Exception $e){}

        return [
            'name' => $this->name ,
            'email' => $this->email ,
            'phone_no' => $this->patient->phone_no ,
            'address' => $this->patient->address ,
            'media' => $media ,
        ];
    }
}
