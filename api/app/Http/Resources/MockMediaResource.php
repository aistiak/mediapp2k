<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MockMediaResource extends JsonResource
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
            
            'id' => 99 ,
            'path' =>  config("media")["mock_prefix"] .'/'. rand(1,43) ,

        ];
    }
}
