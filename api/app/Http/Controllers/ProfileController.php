<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\ContentManager\Entities\Content;
use App\Lib\FileUpload;
use App\Http\Resources\MediaResource ;
use Modules\ContentManager\Transformers\Content as ContentResource;
use App\Http\Resources\PatientDetailResource ;
class ProfileController extends Controller
{
    //

    public function detail(Request $request) {
        // get auth user 
        $user = auth()->user() ;
        // return $user->role;
        // get his role 
        $role = $user->role->slug ;
        // get detail by role
        if( $role == 'hospital') {

            $hospital = $user->hospital ; 
            if($user->media) $hospital['media'] = new MediaResource($user->media);
            return $hospital ;

        }else if( $role == 'doctor'){
            // name , phone ,  
            $doctor = $user->doctor ;
            if($user->media) $doctor['media'] = new MediaResource($user->media) ; 
            return $doctor;

        }else if( $role == 'super_admin'){

            $user = auth()->user() ;
            if($user->media) $user['media'] = new MediaResource($user->media) ;
            return $user ;

        }else if( $role == 'patient' ){

            return new PatientDetailResource( $user );    
        }
    }

    public function store(Request $request){

        $user = auth()->user() ;
        $role = $user->role->slug ;

        if($role == 'hospital'){
            $hospital = auth()->user()->hospital ;
            $hospital->name = $request->name ;
            $hospital->address = $request->address ;
            $hospital->phone_no = $request->phone_no ;
            $hospital->about = $request->about ;
            // $hospital->name = $request->name ;
            $hospital->save() ;
            return $hospital ;

        }else if( $role == 'doctor') {
            $doctor = auth()->user()->doctor ;
            $doctor->name = $request->name ;
            $doctor->title = $request->title ;
            $doctor->phone_no = $request->phone_no ;
            $doctor->save() ;
            return $doctor ;
            
        }else if($role == 'super_admin' ){
            return $role ;
        }else if( $role == 'patient') {
            $request->validate([
                'name' => 'required' , 
                'phone_no' => 'required' 
            ]);
            $user->update([
                'name' => $request->name ,
            ]);

            $user->patient->update([
                'address' => $request->address ,
                'phone_no' => $request->phone_no ,
            ]);
            
            return $user ;
        }

        return  "store";
    }

    public function security(Request $request){
        
        $request->validate([

            // 'old_password' => 'required',
            'new_password' => 'required',
            'password_again' => 'required|same:new_password',
        ]);
        
        $id = auth()->user()->id ;
        
        \App\User::find($id)->update(['password' => bcrypt($request->input('new_password')) ]) ;
        
        // $user->password = bcrypt( $request->input('password')) ;
        return response()->json(['status' => 'success'],200) ;
    }   

    public function avatar(Request $request){
		
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
            $this->delFile($user->media->id) ;
            $user->media->delete();
        }
        $media->file_name = $file ;
        $media->user_id   = $user->id ;
        $media->save() ;
        if($media->save()){

            return new MediaResource( $media );
        }
    }
    
    public function about(Request $request) {
        
        $request->validate([
            'about' => 'required' 
        ]) ;

        $user = auth()->user() ;
        $role = $user->role->slug ;
        
        if($role == 'hospital'){
            
            $user->hospital->update( ['about' => $request->about ]) ;
        }else if( $role == 'doctor' ) {
            // $user->doctor->update( ['about' => $request->about ]) ;
        }

        return response()->json(['data' => 'success'],200);
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
}
