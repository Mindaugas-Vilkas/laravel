<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Use App\Crud;
use Illuminate\Http\Request;

Route::get('/', function() {
    return view('listActions');
});

Route::group(['prefix' => 'rest'], function (){

    Route::get('v1', 'CrudController@index');

    Route::get('v1/{id}', 'CrudController@show');

    Route::post('v1', 'CrudController@store');

    Route::put('v1/{id}', 'CrudController@update');

    Route::delete('v1/{id}', 'CrudController@delete');

});
