<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultatRequest;
use App\Http\Requests\UpdateResultatRequest;
use App\Http\Resources\CorrectionGeneraleResource;
use App\Http\Resources\ResultatResource;
use App\Models\CorrectionGenerale;
use App\Models\Critere;
use App\Models\Evaluation;
use App\Models\Resultat;
use Illuminate\Http\Request;

class ResultatController extends Controller
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
    public function store(StoreResultatRequest $request)
    {
        $resultat = Resultat::updateOrCreate(
        // Clé de recherche — combinaison unique
            [
                'no_etudiant' => $request->no_etudiant,
                'critere_id'  => $request->critere_id,
            ],
            // Valeurs à mettre à jour ou créer
            [
                'niveau_index'   => $request->niveau_index,
                'points_obtenus' => $request->points_obtenus,
                'commentaire'    => $request->commentaire,
            ]
        );

        return new ResultatResource($resultat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultat $resultat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultat $resultat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultatRequest $request, Resultat $resultat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultat $resultat)
    {
        //
    }

    public function resultatsEtuEval(Evaluation $evaluation, string $no_etudiant) {
        $resultats = Resultat::whereHas('critere', function ($query) use ($evaluation) {
            $query->where('evaluation_id', $evaluation->id);
        })
            ->where('no_etudiant', $no_etudiant)
            ->get();

        return ResultatResource::collection($resultats);
    }

    public function commentaireEtuEval(Evaluation $evaluation, string $no_etudiant) {
        $correction = CorrectionGenerale::where('evaluation_id', $evaluation->id)
            ->where('no_etudiant', $no_etudiant)
            ->first();

        if (!$correction) {
            return response()->json(['data' => null]);
        }

        return new CorrectionGeneraleResource($correction);
    }
}
