<?php

namespace Modules\FrontEnd\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class PatientAppointmentResource extends Resource
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
            'date' => $this->date ,
            'doctor_name' => $this->doctor->user->name,
            'hospital_name' => $this->doctor->hospital->name ,  
            'type' => $this->type ,
            'approved' => $this->approved ,
        ];
    }
}
