<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Http\Resources\EvaluationDetailResource;
use App\Http\Resources\EvaluationResource;
use App\Models\Cours;
use App\Models\Evaluation;

class EvaluationController extends Controller
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
    public function store(StoreEvaluationRequest $request)
    {
        $evaluation = Evaluation::create($request->all());

        return EvaluationResource::make($evaluation)->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        return new EvaluationDetailResource(
            $evaluation->load('criteres', 'cours.etudiants')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        $evaluation->update($request->all());
        return EvaluationResource::make($evaluation)->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return response(null, 204);
    }
}
