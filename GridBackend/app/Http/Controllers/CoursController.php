<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoursRequest;
use App\Http\Requests\UpdateCoursRequest;
use App\Http\Resources\CoursDetailResource;
use App\Http\Resources\CoursResource;
use App\Models\Cours;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CoursResource::collection(Cours::orderBy('titre')->get());
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
    public function store(StoreCoursRequest $request)
    {
        $cours = Cours::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Cours $cours)
    {
        $cours->load(['etudiants', 'evaluations']);
        return CoursDetailResource::make($cours);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cours $cours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoursRequest $request, Cours $cours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $cours)
    {
        $cours->delete();
        return response(null, 204);
    }

    public function archiverCours(Cours $cours)
    {
        $cours->update([
            'archive' => true
        ]);
        return response(null, 204);
    }

    public function restaurerCours(Cours $cours)
    {
        $cours->update([
            'archive' => false
        ]);
        return response(null, 204);
    }

    public function retirerEtudiant(Cours $cours, Etudiant $etudiant) {
        $cours->etudiants()->detach($etudiant);
        return response(null, 204);
    }

    public function ajouterEtudiant(Cours $cours, Request $request) {
        $etudiant = Etudiant::find($request->input('no_etudiant'));
        if ($etudiant == null) {
            $etudiant = Etudiant::create([
                'no_etudiant' => $request->input('no_etudiant'),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
            ]);

        }
        $cours->etudiants()->attach($etudiant);
        return response(null, 204);
    }

    public function import(Cours $cours, Request $request) {
        $request->validate([
            'fichier' => 'required|file|mimes:csv,txt'
        ]);

        $fichier = $request->file('fichier');
        $lignes  = array_map('str_getcsv', file($fichier->getPathname()));
        $entete  = array_shift($lignes); // retire la ligne d'entête

        $erreurs = [];
        $importes = 0;

        foreach ($lignes as $index => $ligne) {
            $donnees = array_combine($entete, $ligne);

            // Créer ou retrouver l'étudiant
            $etudiant = Etudiant::firstOrCreate(
                ['no_etudiant' => trim($donnees['no_etudiant'])],
                [
                    'nom'    => trim($donnees['nom']),
                    'prenom' => trim($donnees['prenom']),
                ]
            );

            // Inscrire au cours si pas déjà inscrit
            if (!$cours->etudiants()->where('etudiants.no_etudiant', $etudiant->no_etudiant)->exists()) {
                $cours->etudiants()->attach($etudiant->no_etudiant);
                $importes++;
            }
        }

        return response()->json([
            'importes' => $importes,
            'erreurs'  => $erreurs,
        ]);
    }
}
