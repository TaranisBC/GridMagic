<?php

namespace App\Http\Controllers;

use App\Models\CorrectionGenerale;
use App\Models\Etudiant;
use App\Models\Evaluation;
use App\Models\Resultat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ZipArchive;

class PdfController extends Controller
{
    /**
     * Génère le PDF de correction pour un étudiant.
     */
    public function genererPdf(Evaluation $evaluation, string $no_etudiant): Response
    {
        $etudiant = Etudiant::findOrFail($no_etudiant);

        $criteres = $evaluation->criteres()->orderBy('ordre')->get();

        $resultats = Resultat::whereHas('critere', fn($q) =>
        $q->where('evaluation_id', $evaluation->id))
            ->where('no_etudiant', $no_etudiant)
            ->get();

        $commentaire = CorrectionGenerale::where('evaluation_id', $evaluation->id)
            ->where('no_etudiant', $no_etudiant)
            ->first();

        [$totalPoints, $pointsMax] = $this->calculerPoints($criteres, $resultats);

        $pdf = Pdf::loadView('pdf.grille-correction', [
            'evaluation'  => $evaluation->load('cours'),
            'etudiant'    => $etudiant,
            'criteres'    => $criteres,
            'resultats'   => $resultats,
            'commentaire' => $commentaire,
            'totalPoints' => $totalPoints,
            'pointsMax'   => $pointsMax,
        ])->setPaper('a4');

        $nomFichier = "{$no_etudiant}_{$this->nomSafe($etudiant->nom)}_{$this->nomSafe($evaluation->titre)}.pdf";

        return $pdf->download($nomFichier);
    }

    /**
     * Génère un ZIP contenant les PDFs de tous les étudiants.
     */
    public function genererTousPdf(Evaluation $evaluation): Response
    {
        $evaluation->load('cours.etudiants', 'criteres');
        $criteres = $evaluation->criteres()->orderBy('ordre')->get();

        $zipPath = storage_path("app/temp/corrections_{$evaluation->id}.zip");

        // Créer le dossier temp si nécessaire
        if (!is_dir(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive();
        $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($evaluation->cours->etudiants as $etudiant) {
            $resultats = Resultat::whereHas('critere', fn($q) =>
            $q->where('evaluation_id', $evaluation->id))
                ->where('no_etudiant', $etudiant->no_etudiant)
                ->get();

            $commentaire = CorrectionGenerale::where('evaluation_id', $evaluation->id)
                ->where('no_etudiant', $etudiant->no_etudiant)
                ->first();

            [$totalPoints, $pointsMax] = $this->calculerPoints($criteres, $resultats);

            $pdf = Pdf::loadView('pdf.grille-correction', [
                'evaluation'  => $evaluation,
                'etudiant'    => $etudiant,
                'criteres'    => $criteres,
                'resultats'   => $resultats,
                'commentaire' => $commentaire,
                'totalPoints' => $totalPoints,
                'pointsMax'   => $pointsMax,
            ])->setPaper('a4');

            $nomFichier = "{$etudiant->no_etudiant}_{$this->nomSafe($etudiant->nom)}_{$this->nomSafe($etudiant->prenom)}.pdf";
            $zip->addFromString($nomFichier, $pdf->output());
        }

        $zip->close();

        $nomZip = "{$this->nomSafe($evaluation->titre)}_corrections.zip";

        return response()->download($zipPath, $nomZip)->deleteFileAfterSend();
    }

    /**
     * Calcule le total des points obtenus et le maximum possible.
     */
    private function calculerPoints($criteres, $resultats): array
    {
        $totalPoints = $resultats->sum('points_obtenus');

        $pointsMax = $criteres->reduce(function ($acc, $critere) {
            return $acc + collect($critere->niveaux)->max('points');
        }, 0);

        return [$totalPoints, $pointsMax];
    }

    /**
     * Nettoie une chaîne pour l'utiliser dans un nom de fichier.
     */
    private function nomSafe(string $texte): string
    {
        $sans_accents = iconv('UTF-8', 'ASCII//TRANSLIT', $texte);
        return preg_replace('/[^\w\-]/', '_', $sans_accents);
    }
}
