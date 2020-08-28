<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Doctor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'name' => $this->user->name ,
            'hospital_name' => $this->hospital->name ,
            'is_active' => $this->is_active ,
            'is_enable' => $this->is_enable ,
        ];
    }
}
