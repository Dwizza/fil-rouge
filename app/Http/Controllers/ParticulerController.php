<?php

namespace App\Http\Controllers;

use App\Models\Particuler;
use App\Http\Requests\StoreParticulerRequest;
use App\Http\Requests\UpdateParticulerRequest;

class ParticulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Particulier & entreprise View.index');   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParticulerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Particuler $particuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Particuler $particuler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParticulerRequest $request, Particuler $particuler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Particuler $particuler)
    {
        //
    }
}
