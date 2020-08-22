<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentSettingResource extends JsonResource
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
            'doctor_id' => $this->doctor_id ,
            'is_monthly'     => $this->is_monthly ,
            'is_weekly'     => $this->is_weekly ,
            'is_morning'    => $this->is_morning ,
            'is_evening'    => $this->is_evening ,
            'monthly'        => json_decode( $this->monthly ) ,
            'weekly'        => json_decode( $this->weekly ) ,
            'morning'       => json_decode( $this->morning ) ,
            'evening'       => json_decode( $this->evening) ,
        ];
    }
}
