<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use App\User ;
class Post extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $reporter_name =  User::where('id',$this->reporter_id)->first() ;
        $author_name   =  User::where('id',$this->author_id)->first();
        if($reporter_name!=null) $reporter_name = $reporter_name->name;
        if($author_name!=null) $author_name = $author_name->name;

        return [
            'id'=>$this->id,
            'shoulder'=>$this->shoulder,
            'headline'=>$this->headline,
            'hanger'=>$this->hanger,
            'author_id'=>$this->author_id,
            'author_name'=>$author_name,
            'reporter_id'=>$this->reporter_id,
            'reporter_name'=>$reporter_name,
            'featured_image_id'=>$this->featured_image_id,
            'featured_video_id'=>$this->featured_video_id,
            'video_position'=>$this->video_position,
            'share_at'=>$this->share_at,
            'published_at'=>$this->published_at,
            'status'=>$this->status,
            'Instant_article'=>$this->Instant_article,
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

    }
}
