<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCritereRequest;
use App\Http\Requests\UpdateCritereRequest;
use App\Http\Resources\CritereResource;
use App\Models\Critere;

class CritereController extends Controller
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
    public function store(StoreCritereRequest $request)
    {
        $critere = Critere::create($request->all());
        return new CritereResource($critere);
    }

    /**
     * Display the specified resource.
     */
    public function show(Critere $critere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Critere $critere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCritereRequest $request, Critere $critere)
    {
        $critere->update($request->all());
        return new CritereResource($critere);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Critere $critere)
    {
        //
    }
}
