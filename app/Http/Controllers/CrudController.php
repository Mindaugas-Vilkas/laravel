<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use Illuminate\Support\Facades\Cache;

class CrudController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a cached version of the task list for one day.
        // Will be invalidated as new tasks are made or old ones deleted.
        $response = Cache::remember('tasks', 24*60, function(){
            return Crud::all();
        });
        return response()->json($response);
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
        // Invalidate the cache whenever the tasks are updated.
        // Then let the normal request methods update it if necessary.
        Cache::forget('tasks');
        $task = Crud::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Cache any individual task that has been requested individually to reduce server strain
        // using the unique DB ID for the cache as well.
        $response = Cache::remember("task-{$id}", 24*60, function () use($id) {
            return Crud::find($id);
        });

        return response()->json($response, 200);
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
    public function update(Request $request, Crud $crud, $id)
    {
        // Invalidate both the index cache and the specific task cache if it has been updated.
        // Then let the normal request methods update it if necessary.
        Cache::forget('tasks');
        Cache::forget("task-{$id}");

        $crud = Crud::findOrFail($id);
        $crud->update($request->all());
        return response()->json($crud, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Crud  $crud
     * @param Int $id
     * @return \Illuminate\Http\Response
     * @throws *
     */
    public function delete(Crud $crud, $id)
    {
        // Invalidate both the index cache and the specific task cache if it has been deleted.
        // Then let the normal request methods update it if necessary.
        Cache::forget('tasks');
        Cache::forget("task-{$id}");

        $crud->find($id)->delete();
        return response()->json(null, 201);
    }
}
