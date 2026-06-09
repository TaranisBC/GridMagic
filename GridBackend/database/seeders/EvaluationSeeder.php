<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluations = [
            // Cours 1 — INF3135
            [
                'cours_id'    => 1,
                'titre'       => 'TP1 — HTML et CSS',
                'description' => 'Création d\'une page web statique avec HTML5 et CSS3.',
                'date'        => '2025-02-14',
                'points_total'=> 100,
                'ponderation'=> 10,
            ],
            [
                'cours_id'    => 1,
                'titre'       => 'TP2 — JavaScript',
                'description' => 'Intégration de comportements dynamiques avec JavaScript.',
                'date'        => '2025-03-21',
                'points_total'=> 100,
                'ponderation'=> 30,
            ],
            [
                'cours_id'    => 1,
                'titre'       => 'Examen final',
                'description' => 'Évaluation sommative couvrant l\'ensemble de la matière.',
                'date'        => '2025-04-18',
                'points_total'=> 100,
                'ponderation'=> 60,
            ],
            // Cours 2 — INF3180
            [
                'cours_id'    => 2,
                'titre'       => 'TP1 — Modélisation',
                'description' => 'Conception d\'un schéma entité-relation.',
                'date'        => '2025-02-07',
                'points_total'=> 100,
                'ponderation'=> 15,
            ],
            [
                'cours_id'    => 2,
                'titre'       => 'TP2 — SQL',
                'description' => 'Requêtes SQL avancées et optimisation.',
                'date'        => '2025-03-14',
                'points_total'=> 100,
                'ponderation'=> 25,
            ],
        ];

        foreach ($evaluations as $eval) {
            DB::table('evaluations')->insert([
                ...$eval,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
