<?php

namespace Modules\FrontEnd\Transformers;

use Exception;
use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\MediaResource ;
class HospitalListResource extends Resource
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
            'address' => $this->address ,
            'avatar' => $avater ,
        ];
    }
}
