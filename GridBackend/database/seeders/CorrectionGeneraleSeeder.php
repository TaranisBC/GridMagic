<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorrectionGeneraleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $corrections = [
            // Eval 1 — TP1 HTML/CSS
            [
                'evaluation_id'      => 1,
                'no_etudiant'        => '20210001',
                'commentaire_general' => 'Excellent travail dans l\'ensemble. Marie démontre une très bonne maîtrise des fondamentaux du web.',
            ],
            [
                'evaluation_id'      => 1,
                'no_etudiant'        => '20210002',
                'commentaire_general' => 'Travail satisfaisant. Quelques points à améliorer concernant les bonnes pratiques HTML.',
            ],
            [
                'evaluation_id'      => 1,
                'no_etudiant'        => '20210006',
                'commentaire_general' => 'Le travail rendu est très en dessous des attentes. Je vous encourage fortement à consulter les ressources supplémentaires et à venir me voir en dehors des heures de cours.',
            ],
            [
                'evaluation_id'      => 1,
                'no_etudiant'        => '20210005',
                'commentaire_general' => 'Très beau travail, Emma! La page est créative et bien structurée.',
            ],

            // Eval 4 — TP1 INF3180
            [
                'evaluation_id'      => 4,
                'no_etudiant'        => '20210001',
                'commentaire_general' => 'Modélisation impeccable. Les cardinalités sont toutes correctes.',
            ],
            [
                'evaluation_id'      => 4,
                'no_etudiant'        => '20220001',
                'commentaire_general' => 'Le schéma présente plusieurs lacunes. Veuillez revoir les concepts de clé primaire et de relation N:M.',
            ],
            [
                'evaluation_id'      => 4,
                'no_etudiant'        => '20220003',
                'commentaire_general' => 'Très bonne normalisation. Le schéma est propre et bien réfléchi.',
            ],
        ];

        foreach ($corrections as $correction) {
            DB::table('correction_generales')->insert([
                ...$correction,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
