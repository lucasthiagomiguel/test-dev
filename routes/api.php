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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/carros','Carros@index');
Route::get('/marca','Carros@marcasJson');
Route::post('/carros','Carros@store');
Route::delete('/carros/{carro}','Carros@destroy');
Route::get('/carros/{carro}','Carros@show');
Route::put('/carros/{carro}','Carros@update');


