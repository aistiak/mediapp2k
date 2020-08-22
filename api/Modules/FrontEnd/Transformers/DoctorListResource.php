<?php

namespace Modules\FrontEnd\Transformers;
use App\Http\Resources\AppointmentSettingResource;
use Illuminate\Http\Resources\Json\Resource;

class DoctorListResource extends Resource
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
            'id'   =>  $this->id ,
            'name' =>  $this->user->name ,
            'hospital_name' =>  $this->hospital->name ,
            'appointment_setting' => new AppointmentSettingResource( $this->appointment_setting ),
        ];
    }
}
