<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', function(Request $request){
    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Requested API' ]));
    $response->header('Content-Type', 'application/json');

    return $response;
});

// Route::get('/get_api', function(){
//     return App\Models\Product::all();
// });
// Route::get('/gettest', [App\Http\Controllers\Api\Test]);

Route::get('/getprodtest', [App\Http\Controllers\Api\TestController::class,'index'])->name('test');
Route::get('/product', [App\Http\Controllers\Api\ProductController::class,'index'])->name('product');