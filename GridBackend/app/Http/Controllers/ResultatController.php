<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultatRequest;
use App\Http\Requests\UpdateResultatRequest;
use App\Http\Resources\ResultatResource;
use App\Models\Critere;
use App\Models\Resultat;
use Illuminate\Http\Request;
use LDAP\Result;

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

    public function resultatsEtuEval(Request $request) {
        $criteres = Critere::where('evaluation_id', $request->evaluation_id)->get();
        $resultats = [];
        foreach ($criteres as $critere) {
            $res = Resultat::where('critere_id', $critere->id)->where('no_etudiant', $request->no_etudiant)->get();
            $resultats[] = $res;
        }
        return ResultatResource::collection($resultats);
    }
}
