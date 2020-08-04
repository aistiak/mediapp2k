<?php

namespace Modules\UserManagement\Http\Controllers;

use App\User;
use Sentinel;
use DB;
// use App\RoleUser;
use Modules\UserManagement\Transformers\Role as RoleResource;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    
    
    public function index(Request $request)
    {   
        $role = DB::table('roles')->get();
        // $role = DB::table('roles')->get();
        return RoleResource::collection($role);
    }

    public function index2()
    {   
        $user_id = Auth()->user()->id;
        $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        $role = Sentinel::findRoleById($role_id);
        return new RoleResource($role);
    }

    public function index3()
    {   
        $role = DB::table('roles')->whereNotIn('id', [1,2])->get();
        // $role = DB::table('roles')->get();
        return RoleResource::collection($role);
    }

    public function store(Request $request)
    {
        // validator 
        $validate = $request->validate([
              'name' => 'required',  
        ]);
        // return $request ;
        try{
            $name = $request->name;
            $slug = strtolower($request->name);
            $role = Sentinel::getRoleRepository()->createModel()->create([
                'name' => $name,
                'slug' => $slug,
            ]);
            
            $role->permissions = [


                'role.view'   => $request->role_view,   
                'role.viewall'   => $request->role_viewall,   
                'role.create' => $request->role_create,
                'role.update' => $request->role_update,
                'role.updateall' => $request->role_updateall,
                'role.delete' => $request->role_delete,
                'role.deleteall' => $request->role_deleteall,

                'user.view'   => $request->user_view,   
                'user.viewall'   => $request->user_viewall,   
                'user.create' => $request->user_create,
                'user.update' => $request->user_update,
                'user.updateall' => $request->user_updateall,
                'user.delete' => $request->user_delete,
                'user.deleteall' => $request->user_deleteall,

                'hospital.view'   => $request->hospital_view,   
                'hospital.viewall'   => $request->hospital_viewall,   
                'hospital.create' => $request->hospital_create,
                'hospital.update' => $request->hospital_update,
                'hospital.updateall' => $request->hospital_updateall,
                'hospital.delete' => $request->hospital_delete,
                'hospital.deleteall' => $request->hospital_deleteall,

                'doctor.view'   => $request->doctor_view,   
                'doctor.viewall'   => $request->doctor_viewall,   
                'doctor.create' => $request->doctor_create,
                'doctor.update' => $request->doctor_update,
                'doctor.updateall' => $request->doctor_updateall,
                'doctor.delete' => $request->doctor_delete,
                'doctor.deleteall' => $request->doctor_deleteall,




            ];
            $role->permissions2 = json_encode([


                'role_view'   => $request->role_view,   
                'role_viewall'   => $request->role_viewall,   
                'role_create' => $request->role_create,
                'role_update' => $request->role_update,
                'role_updateall' => $request->role_updateall,
                'role_delete' => $request->role_delete,
                'role_deleteall' => $request->role_deleteall,    

                'user_view'   => $request->user_view,   
                'user_viewall'   => $request->user_viewall,   
                'user_create' => $request->user_create,
                'user_update' => $request->user_update,
                'user_updateall' => $request->user_updateall,
                'user_delete' => $request->user_delete,
                'user_deleteall' => $request->user_deleteall, 
                
                'hospital_view'   => $request->hospital_view,   
                'hospital_viewall'   => $request->hospital_viewall,   
                'hospital_create' => $request->hospital_create,
                'hospital_update' => $request->hospital_update,
                'hospital_updateall' => $request->hospital_updateall,
                'hospital_delete' => $request->hospital_delete,
                'hospital_deleteall' => $request->hospital_deleteall,

                'doctor_view'   => $request->doctor_view,   
                'doctor_viewall'   => $request->doctor_viewall,   
                'doctor_create' => $request->doctor_create,
                'doctor_update' => $request->doctor_update,
                'doctor_updateall' => $request->doctor_updateall,
                'doctor_delete' => $request->doctor_delete,
                'doctor_deleteall' => $request->doctor_deleteall,
               

            ]);

            // $log_user = Auth()->user();
            // $role->created_by = $log_user->id;
            // $role->updated_by = $log_user->id;

            if($role->save()){
                return new RoleResource($role);
            }
        }
        catch (QueryException $e) {
            return response()->json(['error'=>'Role name must be unique'],400);
        }
    }

    public function update(Request $request)
    {

        try{
            
            // $name = $request->input('name');
            // $slug = strtolower($request->input('role_name'));
            $role = Sentinel::findRoleById($request->id);
            // $role->name = $name;
            // $role->slug = $slug;
            $role->permissions = [


                'role.view'   => $request->role_view,   
                'role.viewall'   => $request->role_viewall,   
                'role.create' => $request->role_create,
                'role.update' => $request->role_update,
                'role.updateall' => $request->role_updateall,
                'role.delete' => $request->role_delete,
                'role.deleteall' => $request->role_deleteall,

                'user.view'   => $request->user_view,   
                'user.viewall'   => $request->user_viewall,   
                'user.create' => $request->user_create,
                'user.update' => $request->user_update,
                'user.updateall' => $request->user_updateall,
                'user.delete' => $request->user_delete,
                'user.deleteall' => $request->user_deleteall,

                'hospital.view'   => $request->hospital_view,   
                'hospital.viewall'   => $request->hospital_viewall,   
                'hospital.create' => $request->hospital_create,
                'hospital.update' => $request->hospital_update,
                'hospital.updateall' => $request->hospital_updateall,
                'hospital.delete' => $request->hospital_delete,
                'hospital.deleteall' => $request->hospital_deleteall,

                'doctor.view'   => $request->doctor_view,   
                'doctor.viewall'   => $request->doctor_viewall,   
                'doctor.create' => $request->doctor_create,
                'doctor.update' => $request->doctor_update,
                'doctor.updateall' => $request->doctor_updateall,
                'doctor.delete' => $request->doctor_delete,
                'doctor.deleteall' => $request->doctor_deleteall,


            ];
            $role->permissions2 = json_encode([
                'role_view'   => $request->role_view,   
                'role_viewall'   => $request->role_viewall,   
                'role_create' => $request->role_create,
                'role_update' => $request->role_update,
                'role_updateall' => $request->role_updateall,
                'role_delete' => $request->role_delete,
                'role_deleteall' => $request->role_deleteall,    

                'user_view'   => $request->user_view,   
                'user_viewall'   => $request->user_viewall,   
                'user_create' => $request->user_create,
                'user_update' => $request->user_update,
                'user_updateall' => $request->user_updateall,
                'user_delete' => $request->user_delete,
                'user_deleteall' => $request->user_deleteall, 
                
                'hospital_view'   => $request->hospital_view,   
                'hospital_viewall'   => $request->hospital_viewall,   
                'hospital_create' => $request->hospital_create,
                'hospital_update' => $request->hospital_update,
                'hospital_updateall' => $request->hospital_updateall,
                'hospital_delete' => $request->hospital_delete,
                'hospital_deleteall' => $request->hospital_deleteall,

                'doctor_view'   => $request->doctor_view,   
                'doctor_viewall'   => $request->doctor_viewall,   
                'doctor_create' => $request->doctor_create,
                'doctor_update' => $request->doctor_update,
                'doctor_updateall' => $request->doctor_updateall,
                'doctor_delete' => $request->doctor_delete,
                'doctor_deleteall' => $request->doctor_deleteall,  

            ]);
            // $log_user = Auth()->user();
            // $role->updated_by = $log_user->id;

            if($role->save()){
                return new RoleResource($role);
            }
        }
        catch (QueryException $e) {
            return response()->json(['error'=>'Role name must be unique'],400);
        }
       
        
    }
    // public function detail($id){
    //     $role = Sentinel::findRoleByID($id);

    // }
    
    public function destroy($id)
    {
        $role = Sentinel::findRoleById($id);


        // $guest = Sentinel::findRoleByName('Guest');
        // if($id != $guest->id){
        //     if($role->delete()){
        //         return new RoleResource($role);
        //     }
        // }
        // else{
        //     return response()->json("Not Possible",401);
        // }

        if($role->delete()){
            return new RoleResource($role);
        }
        
    }

    public function getPermission($id)
    {
        $role = Sentinel::findRoleById($id);
        $contact_view   = $role->permissions["contact.view"];
        $contact_create = $role->permissions["contact.create"];
        $contact_update = $role->permissions["contact.update"];
        $contact_delete = $role->permissions["contact.delete"];

        $permission = ['contact_view'=>$contact_view,'contact_create'=>$contact_create,'contact_update'=>$contact_update,'contact_delete'=>$contact_delete];
        return response()->json($permission,200);
    }

    public function updatePermission(Request $request)
    {
        $role_id        = $request->input('role_id');
        $contact_view   = $request->input('contact_view');
        $contact_create = $request->input('contact_create');
        $contact_update = $request->input('contact_update');
        $contact_delete = $request->input('contact_delete');

        $role = Sentinel::findRoleById($role_id);

        $role->permissions = [
            'contact.view'   => $contact_view,
            'contact.create' => $contact_create,
            'contact.update' => $contact_update,
            'contact.delete' => $contact_delete,
        ];
        $role->save();
        $contact_view   = $role->permissions["contact.view"];
        $contact_create = $role->permissions["contact.create"];
        $contact_update = $role->permissions["contact.update"];
        $contact_delete = $role->permissions["contact.delete"];

        $permission = ['contact_view'=>$contact_view,'contact_create'=>$contact_create,'contact_update'=>$contact_update,'contact_delete'=>$contact_delete];
        return response()->json($permission,200);
    }


    public function testRole(){

       $role_info = DB::table('role_users')
        ->join('users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.name as user_name','users.email','roles.name as role_name','role_users.*')
        ->get();

        return response()->json($role_info,200);
    }

    public function getAssignRole(){

      $role_info = DB::table('role_users')->whereNotIn('role_id', [1,2])
        ->join('users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.name as user_name','users.email','roles.name as role_name','role_users.*')
        ->get();

      return response()->json($role_info,200);
    }

    public function updateAssignRole(Request $request){

        $role_id     = $request->role_id;
        $old_role_id = $request->old_role_id;
        $user_id     = $request->user_id;

        $user = Sentinel::findById($user_id);
        $old_role = Sentinel::findRoleById($old_role_id);

        if($old_role){
            $old_role->users()->detach($user);
        }
        
        $role = Sentinel::findRoleById($role_id);
        $role->users()->attach($user);

      $role_info = DB::table('role_users')
        ->join('users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.name as user_name','users.email','roles.name as role_name','role_users.*')
        ->where('users.id', $user_id)
        ->get();

      return response()->json($role_info,200);
    }
}
