<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//         'device_name' => 'required',
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }
// $data=[
//     'user'=>$user,
//     'token'=>$user->createToken($request->device_name)->plainTextToken
// ];
//     return response()->json($data);
// });


// Route::group(['middleware' => 'auth:sanctum'], function(){
//     Route::get('user', function(Request $request) {
//         return response()->json($request->user());
//     });
//  });

Route::middleware('auth:api')->get('/user',function(Request $request){
	return $request->user();
});

Route::apiresource('categories','Api\CategoryController');
Route::apiresource('subcategories','Api\SubcategoryController');
Route::apiresource('brands','Api\BrandController');
Route::apiresource('items','Api\ItemController');
