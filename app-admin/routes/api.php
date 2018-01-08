<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'guest'], function () {
    //用户管理
    Route::post('/role/user/store/{id}', ['as' => 'api.role.user.store', 'uses' => 'Api\Role\UserController@store']);
    Route::post('/role/user/update/{id}', ['as' => 'api.role.user.update', 'uses' => 'Api\Role\UserController@update']);
    Route::post('/role/user/delete/{id}', ['as' => 'api.role.user.delete', 'uses' => 'Api\Role\UserController@delete']);
    Route::post('/role/user/set-password/{id}', ['as' => 'api.role.user.set-password', 'uses' => 'Api\Role\UserController@setPassword']);
    //角色管理
    Route::post('/role/role/update/{id}', ['as' => 'api.role.role.update', 'uses' => 'Api\Role\RoleController@update']);
    Route::post('/role/role/store/{id}', ['as' => 'api.role.role.store', 'uses' => 'Api\Role\RoleController@store']);
    Route::post('/role/role/delete/{id}', ['as' => 'api.role.role.delete', 'uses' => 'Api\Role\RoleController@delete']);
});