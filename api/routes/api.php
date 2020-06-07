<?php

use Illuminate\Http\Request;

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


Route::post('api/login','RegisterLoginPasswordResetController@login');


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







