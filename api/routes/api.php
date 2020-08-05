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

// 	 	FOR BACKEND ADMIN PANEL 
Route::post('api/login','RegisterLoginPasswordResetController@login');
// auth test

Route::prefix('api')->middleware(['auth:api'])->group(function(){
	Route::post('auth-user','RegisterLoginPasswordResetController@authUser');
	Route::get('auth-test',function(){
		return auth()->user() ;
	});

});
// Route::middleware('auth:api')->post('/user', function () {
//     $user = Auth()->user();
//     return $user;
//     return response()->json([
// 		'user' =>[
// 			'name' =>'rafi',
// 			'age' =>23
// 		]
// 	]);
// });
// })->middleware(AdminMiddleware::class);
// Route::post('/register','AuthController@register');
Route::prefix('hospital')->middleware([])->group(function(){
	Route::get('/','HospitalController@index');
	Route::post('/','HospitalController@store');
	Route::put('/','HospitalController@store');
	Route::delete('/{id}','HospitalController@destroy');
});

Route::prefix('user')->middleware(['auth:api','admin'])->group(function(){
	Route::get('/','HospitalController@index');
	Route::post('/','HospitalController@store');
	Route::put('/','HospitalController@store');
	Route::delete('/{id}','HospitalController@destroy');
});

Route::prefix('doctor')->middleware(['auth:api','admin'])->group(function(){
	Route::get('/','DoctorController@index');
	Route::post('/','DoctorController@store');
	Route::put('/','DoctorController@store');
	Route::delete('/{id}','DoctorController@destroy');
});

Route::prefix('appointment_setting')->middleware([])->group(function(){
	Route::get('/','AppointmentSettingController@detail');
	Route::post('/','AppointmentSettingController@store');
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

// Route::prefix('contacts')->middleware(['auth:api','admin'])->group(function() {

// 	Route::post('/','ContactController@store');
// 	Route::put('/','ContactController@store');
// 	Route::delete('/{id}','ContactController@destroy');
// });






//visa 


Route::get('/test', function () {
    return response()->json([
		'user' =>[
			'name' =>'rafi',
			'age' =>23
		]
	]);
});







