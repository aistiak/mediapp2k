<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MediaResource ;
use App\Lib\FileUpload;

class HospitalSliderController extends Controller
{
    //
    public function index() {
        // return "ok" ;
        $hospital = auth()->user()->hospital ;
        
        // get media ids from hospital json 
       
        $ids = json_decode( $hospital->slider_ids ) ;
            
        // retun with resource 
        return MediaResource::collection( \App\Media::find($ids) ) ;
        // return "ok boomer" ;
    
    }

    public function upload(Request $request) {
        
        $hospital = auth()->user()->hospital ;
        // upload media 
        
        if($media = $this->uploadFile( $request ) ) {
           $ids = json_decode ( $hospital->slider_ids ) ;

           array_push($ids,$media->id) ;
           $hospital->update([ 'slider_ids' => json_encode($ids) ]) ;
           return  MediaResource::collection( \App\Media::find( $ids ) );
        }
        return response()->json(['error' => 'could not upload '],400 );
        // add id to hospital json 
    
    }

    public function destroy($id){

        $hospital = auth()->user()->hospital ;
        // get media ids from hospital json 
        $ids = json_decode( $hospital->slider_ids ) ;
        // remove from media 
        if (($key = array_search($id, $ids)) !== false) {

            unset($ids[$key]);
            $this->delFile($id) ;
            $hospital->update(['slider_ids' => json_encode( array_values($ids) ) ]) ;
            return MediaResource::collection( \App\Media::find( $ids ) ) ;
        }
        
        return response()->json(['error' => 'file not deleted']) ;
        // remove from hospital json 

    }

	public function delFile($id){

		$doc = \App\Media::findOrFail($id);
        $path           = 'uploads/';
        $file = $doc->file_name;
        $file_upload = new FileUpload;
        $upload = $file_upload->remove($file,$path);
		if($doc->delete()){
			return $doc ;
        }      
	}

    
    public function uploadFile(Request $request){
		
    	$validator = $request->validate([
    		'file'     => 'required',
    		// 'title'    => 'required',
    	]);
    	$user = auth()->user() ;
    	// $Content =  new Content ;
        $media = new \App\Media ;    

        if ($request->hasFile('file'))
        {
            $file           = $request->file('file');
            $prefix         = 'file';
            $path           = 'uploads/';

            $file_upload = new FileUpload;
            $upload = $file_upload->upload($file, $prefix, $path);
            $file = $upload['file_name'];
            $type = $upload['type'];
            
        }
        else
        {
            
            $file = $request->input('file');
            $type = $request->input('type');
        }
        if($user->media) {
            // $this->delFile($user->media->id) ;
            // $user->media->delete();
        }
        $media->file_name = $file ;
        $media->user_id   = $user->id ;
        $media->save() ;
        if($media->save()){

           return $media ;
        }
        return null ;
	}

}
