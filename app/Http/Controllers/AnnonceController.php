<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Http\Requests\StoreannonceRequest;
use App\Http\Requests\UpdateannonceRequest;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreannonceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateannonceRequest $request, annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(annonce $annonce)
    {
        //
    }
}
