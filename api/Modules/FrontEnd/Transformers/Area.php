<?php

namespace Modules\FrontEnd\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\FrontEnd\Transformers\Area as AreaResource;
class area extends Resource
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
            'id'=> $this->id,
            'title'=> $this->title,
            'parent_id' => $this->parent_id ,
            'children'   => AreaResource::collection($this->child),
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
