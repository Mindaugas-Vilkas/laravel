<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class CrudController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \App\crud[]\
     */
    public function index()
    {
        return Crud::all();
    }

    /**
     *
     *
     * @deprecated
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Crud
     */
    public function store(Request $request)
    {
        $task = Crud::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        return Crud::find($crud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @deprecated
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crud $crud)
    {
        $crud->update($request->all());

        return response()->json($crud, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Crud  $crud
     * @return \Illuminate\Http\Response
     * @throws \HttpResponseException
     */
    public function delete(Crud $crud)
    {
        $crud->delete();

        return response()->json(null, 201);
    }
}
