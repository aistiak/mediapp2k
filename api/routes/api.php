<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Sentinel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Middleware\AdminMiddleware;
use App\Http\Resources\AuthUserResource;

// 	 	FOR BACKEND ADMIN PANEL 
Route::post('api/login','RegisterLoginPasswordResetController@login');
Route::post('api/register','RegisterLoginPasswordResetController@registerAccount');
// auth test

Route::prefix('api')->middleware(['auth:api'])->group(function(){
	Route::post('auth-user','RegisterLoginPasswordResetController@authUser');
	Route::get('auth-test',function(){
		return auth()->user() ;
	});

});
// auth user refresh 
Route::middleware(['auth:api'])->post('api/auth_user/refresh',function(){
	return   new AuthUserResource (auth()->user() );
}) ;

Route::prefix('hospital')->middleware(['auth:api'])->group(function(){
	Route::get('/','HospitalController@index');
	Route::post('/','HospitalController@store');
	Route::post('status/{id}','HospitalController@toggleStatus');
	Route::put('/','HospitalController@store');
	Route::put('/approve/{id}','HospitalController@approve');
	Route::delete('/{id}','HospitalController@destroy');
	Route::post('/add/doctor','HospitalController@addDoctor') ;

	Route::prefix('slider')->group(function(){
		
		Route::get('/','HospitalSliderController@index');
		
		Route::post('/','HospitalSliderController@upload');
		
		Route::delete('/{id}','HospitalSliderController@destroy');
	});


});

// Route::prefix('user')->middleware(['auth:api','admin'])->group(function(){
// 	Route::get('/','HospitalController@index');
// 	Route::post('/','HospitalController@store');
// 	Route::put('/','HospitalController@store');
// 	Route::delete('/{id}','HospitalController@destroy');
// });

Route::prefix('doctor')->middleware(['auth:api'])->group(function(){
	Route::get('/','DoctorController@index'); // if has id then detail else list (role wise)
	Route::post('/','DoctorController@store');
	Route::post('status/{id}','DoctorController@toggleStatus');
	Route::put('/approve/{id}','DoctorController@approve');
	Route::put('/','DoctorController@store');
	Route::delete('/{id}','DoctorController@destroy');
});
// TODO 
Route::prefix('api/appointment_setting')->middleware(['auth:api'])->group(function(){
	Route::get('/','AppointmentSettingController@detail');
	Route::post('/','AppointmentSettingController@store');
	Route::get('/test','AppointmentSettingController@test');
});
// for doctos and hospitals 
// Route::prefix('appointment')->middleware([])->group(function(){

Route::prefix('api/appointment')->middleware(['auth:api'])->group(function(){

	Route::get('/','AppointmentController@index');
	Route::post('/','AppointmentController@create');
	Route::post('/approve','AppointmentController@approve');
	Route::put('/','AppointmentController@store');
	Route::delete('/{id}','AppointmentController@destroy');

});
Route::prefix('api/patient')->middleware(['auth:api'])->group(function(){
	Route::get('/','PatientController@index');
});

// Approval controller
Route::prefix('api/approval')->middleware(['auth:api'])->group(function(){
	Route::post('/','ApprovalController@approve');
});
Route::prefix('api/toggle-enable')->middleware(['auth:api'])->group(function(){
	Route::post('/','ApprovalController@toggleEnable');
});
// Route::prefix('contacts')->middleware(['auth:api','admin'])->group(function() {

// 	Route::post('/','ContactController@store');
// 	Route::put('/','ContactController@store');
// 	Route::delete('/{id}','ContactController@destroy');
// });

Route::prefix('api/profile')->middleware(['auth:api'])->group(function(){
	Route::get('/','ProfileController@detail');
	Route::put('/','ProfileController@store');
	Route::put('/security','ProfileController@security');
	Route::post('/avatar','ProfileController@avatar');
	Route::post('/about','ProfileController@about');
});




//visa 


Route::get('/test', function () {
    return response()->json([
		'user' =>[
			'name' =>'rafi',
			'age' =>23
		]
	]);
});







