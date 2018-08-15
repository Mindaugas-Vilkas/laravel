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

Route::get('/', function () {
    return view('welcome');
});

Route::get('listControl', function() {
    return view('listActions');
});

Route::get('create', function() {
    return view('create');
});


//-----------------------------------

Route::get('rest/v1', 'CrudController@index');
Route::get('rest/v1/{id}', 'CrudController@show');
Route::post('rest/v1', 'CrudController@store');
Route::put('rest/v1/{id}', 'CrudController@update');
Route::delete('rest/v1/{id}', 'CrudController@delete');

//-----------------------------------

Route::post('rest/v1', function (Request $request) {
    return Crud::create($request->all());
});

Route::get('rest/v1', function () {
    return Crud::all();
});

Route::get('rest/v1/{id}', function ($id) {
    return Crud::find($id);
});

Route::put('rest/v1/{id}', function ( $id, Request $request) {
    $crud = Crud::findOrFail($id);
    $crud->update($request->all());
    return $crud;
});

Route::delete('rest/v1/{id}', function ($id) {
    Crud::find($id)->delete();
});