<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorrectionGeneraleRequest;
use App\Http\Requests\UpdateCorrectionGeneraleRequest;
use App\Http\Resources\CorrectionGeneraleResource;
use App\Models\CorrectionGenerale;

class CorrectionGeneraleController extends Controller
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
    public function store(StoreCorrectionGeneraleRequest $request)
    {
        $correction = CorrectionGenerale::updateOrCreate(
            [
                'evaluation_id' => $request->evaluation_id,
                'no_etudiant'   => $request->no_etudiant,
            ],
            [
                'commentaire_general' => $request->commentaire,
            ]
        );

        return new CorrectionGeneraleResource($correction);
    }

    /**
     * Display the specified resource.
     */
    public function show(CorrectionGenerale $correctionGenerale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CorrectionGenerale $correctionGenerale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorrectionGeneraleRequest $request, CorrectionGenerale $correctionGenerale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CorrectionGenerale $correctionGenerale)
    {
        //
    }
}
