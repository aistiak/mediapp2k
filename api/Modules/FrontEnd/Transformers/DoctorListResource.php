<?php

namespace Modules\FrontEnd\Transformers;
use App\Http\Resources\AppointmentSettingResource;
use Exception;
use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\MediaResource ;
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
        $avatar = "" ;
        try{
            $avatar = new MediaResource($this->user->media);
        }catch(Exception $e){}
        return [
            'id'   =>  $this->id ,
            'name' =>  $this->user->name ,
            'hospital_name' =>  $this->hospital->name ,
            'appointment_setting' => new AppointmentSettingResource( $this->appointment_setting ),
            'avatar' => $avatar , 
        ];
    }
}
