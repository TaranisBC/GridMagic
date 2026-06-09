<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Résultats pour l'évaluation 1 (TP1 HTML/CSS) — critères 1, 2, 3
        // Étudiants du cours 1 : 20210001 à 20210008
        $resultatsEval1 = [
            // Marie Tremblay — excellente
            ['no_etudiant' => '20210001', 'critere_id' => 1, 'niveau_index' => 0, 'points_obtenus' => 30, 'commentaire' => 'Excellent travail, structure parfaite.'],
            ['no_etudiant' => '20210001', 'critere_id' => 2, 'niveau_index' => 0, 'points_obtenus' => 38, 'commentaire' => 'Mise en page très soignée.'],
            ['no_etudiant' => '20210001', 'critere_id' => 3, 'niveau_index' => 0, 'points_obtenus' => 30, 'commentaire' => ''],

            // Jean Côté — satisfaisant
            ['no_etudiant' => '20210002', 'critere_id' => 1, 'niveau_index' => 1, 'points_obtenus' => 22, 'commentaire' => 'Quelques balises non sémantiques.'],
            ['no_etudiant' => '20210002', 'critere_id' => 2, 'niveau_index' => 1, 'points_obtenus' => 30, 'commentaire' => ''],
            ['no_etudiant' => '20210002', 'critere_id' => 3, 'niveau_index' => 1, 'points_obtenus' => 22, 'commentaire' => 'Indentation à améliorer.'],

            // Sophie Gagnon — acceptable
            ['no_etudiant' => '20210003', 'critere_id' => 1, 'niveau_index' => 2, 'points_obtenus' => 15, 'commentaire' => 'Structure à revoir.'],
            ['no_etudiant' => '20210003', 'critere_id' => 2, 'niveau_index' => 1, 'points_obtenus' => 30, 'commentaire' => ''],
            ['no_etudiant' => '20210003', 'critere_id' => 3, 'niveau_index' => 2, 'points_obtenus' => 15, 'commentaire' => ''],

            // Luc Bouchard — satisfaisant avec ajustement
            ['no_etudiant' => '20210004', 'critere_id' => 1, 'niveau_index' => 1, 'points_obtenus' => 24, 'commentaire' => 'Bonne structure dans l\'ensemble.'],
            ['no_etudiant' => '20210004', 'critere_id' => 2, 'niveau_index' => 1, 'points_obtenus' => 30, 'commentaire' => ''],
            ['no_etudiant' => '20210004', 'critere_id' => 3, 'niveau_index' => 1, 'points_obtenus' => 22, 'commentaire' => ''],

            // Emma Gauthier — excellent
            ['no_etudiant' => '20210005', 'critere_id' => 1, 'niveau_index' => 0, 'points_obtenus' => 30, 'commentaire' => ''],
            ['no_etudiant' => '20210005', 'critere_id' => 2, 'niveau_index' => 0, 'points_obtenus' => 40, 'commentaire' => 'Design créatif et responsive.'],
            ['no_etudiant' => '20210005', 'critere_id' => 3, 'niveau_index' => 0, 'points_obtenus' => 28, 'commentaire' => 'Quelques commentaires manquants.'],

            // Alexis Morin — insuffisant
            ['no_etudiant' => '20210006', 'critere_id' => 1, 'niveau_index' => 3, 'points_obtenus' => 5,  'commentaire' => 'Structure HTML absente.'],
            ['no_etudiant' => '20210006', 'critere_id' => 2, 'niveau_index' => 3, 'points_obtenus' => 8,  'commentaire' => 'Aucun style appliqué.'],
            ['no_etudiant' => '20210006', 'critere_id' => 3, 'niveau_index' => 3, 'points_obtenus' => 5,  'commentaire' => 'Code difficile à lire.'],

            // Camille Lavoie — satisfaisant
            ['no_etudiant' => '20210007', 'critere_id' => 1, 'niveau_index' => 1, 'points_obtenus' => 22, 'commentaire' => ''],
            ['no_etudiant' => '20210007', 'critere_id' => 2, 'niveau_index' => 1, 'points_obtenus' => 30, 'commentaire' => ''],
            ['no_etudiant' => '20210007', 'critere_id' => 3, 'niveau_index' => 0, 'points_obtenus' => 30, 'commentaire' => 'Code exemplaire.'],

            // Nicolas Fortin — acceptable
            ['no_etudiant' => '20210008', 'critere_id' => 1, 'niveau_index' => 2, 'points_obtenus' => 15, 'commentaire' => ''],
            ['no_etudiant' => '20210008', 'critere_id' => 2, 'niveau_index' => 2, 'points_obtenus' => 20, 'commentaire' => 'Mise en page basique.'],
            ['no_etudiant' => '20210008', 'critere_id' => 3, 'niveau_index' => 1, 'points_obtenus' => 22, 'commentaire' => ''],
        ];

        // Résultats partiels pour l'évaluation 2 (TP2 JavaScript) — critères 4, 5, 6
        $resultatsEval2 = [
            ['no_etudiant' => '20210001', 'critere_id' => 4, 'niveau_index' => 0, 'points_obtenus' => 35, 'commentaire' => 'DOM manipulé de façon exemplaire.'],
            ['no_etudiant' => '20210001', 'critere_id' => 5, 'niveau_index' => 0, 'points_obtenus' => 35, 'commentaire' => ''],
            ['no_etudiant' => '20210001', 'critere_id' => 6, 'niveau_index' => 0, 'points_obtenus' => 30, 'commentaire' => ''],

            ['no_etudiant' => '20210002', 'critere_id' => 4, 'niveau_index' => 1, 'points_obtenus' => 26, 'commentaire' => ''],
            ['no_etudiant' => '20210002', 'critere_id' => 5, 'niveau_index' => 2, 'points_obtenus' => 17, 'commentaire' => 'Gestion des événements incomplète.'],
            ['no_etudiant' => '20210002', 'critere_id' => 6, 'niveau_index' => 1, 'points_obtenus' => 22, 'commentaire' => ''],

            ['no_etudiant' => '20210003', 'critere_id' => 4, 'niveau_index' => 1, 'points_obtenus' => 26, 'commentaire' => ''],
            ['no_etudiant' => '20210003', 'critere_id' => 5, 'niveau_index' => 1, 'points_obtenus' => 26, 'commentaire' => ''],
            ['no_etudiant' => '20210003', 'critere_id' => 6, 'niveau_index' => 1, 'points_obtenus' => 22, 'commentaire' => ''],
        ];

        // Résultats pour éval 4 (TP1 INF3180) — critères 10, 11
        $resultatsEval4 = [
            ['no_etudiant' => '20210001', 'critere_id' => 10, 'niveau_index' => 0, 'points_obtenus' => 50, 'commentaire' => 'Schéma impeccable.'],
            ['no_etudiant' => '20210001', 'critere_id' => 11, 'niveau_index' => 0, 'points_obtenus' => 50, 'commentaire' => ''],

            ['no_etudiant' => '20210003', 'critere_id' => 10, 'niveau_index' => 1, 'points_obtenus' => 38, 'commentaire' => ''],
            ['no_etudiant' => '20210003', 'critere_id' => 11, 'niveau_index' => 1, 'points_obtenus' => 38, 'commentaire' => ''],

            ['no_etudiant' => '20210005', 'critere_id' => 10, 'niveau_index' => 0, 'points_obtenus' => 50, 'commentaire' => ''],
            ['no_etudiant' => '20210005', 'critere_id' => 11, 'niveau_index' => 1, 'points_obtenus' => 40, 'commentaire' => 'Normalisation presque complète.'],

            ['no_etudiant' => '20220001', 'critere_id' => 10, 'niveau_index' => 2, 'points_obtenus' => 25, 'commentaire' => 'Schéma à retravailler.'],
            ['no_etudiant' => '20220001', 'critere_id' => 11, 'niveau_index' => 2, 'points_obtenus' => 25, 'commentaire' => ''],

            ['no_etudiant' => '20220002', 'critere_id' => 10, 'niveau_index' => 1, 'points_obtenus' => 38, 'commentaire' => ''],
            ['no_etudiant' => '20220002', 'critere_id' => 11, 'niveau_index' => 1, 'points_obtenus' => 38, 'commentaire' => ''],

            ['no_etudiant' => '20220003', 'critere_id' => 10, 'niveau_index' => 1, 'points_obtenus' => 38, 'commentaire' => ''],
            ['no_etudiant' => '20220003', 'critere_id' => 11, 'niveau_index' => 0, 'points_obtenus' => 50, 'commentaire' => 'Excellente maîtrise de la normalisation.'],
        ];

        $tous = array_merge($resultatsEval1, $resultatsEval2, $resultatsEval4);

        foreach ($tous as $resultat) {
            DB::table('resultats')->insert([
                ...$resultat,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
