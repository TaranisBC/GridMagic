<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CritereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteres = [
            // ── Eval 1 : TP1 HTML/CSS ─────────────────────────────────────────
            [
                'evaluation_id' => 1,
                'titre'         => 'Structure HTML',
                'description'   => 'Utilisation sémantique des balises HTML5.',
                'ordre'         => 1,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 30, 'description' => 'Structure sémantique complète et sans erreur'],
                    ['label' => 'Satisfaisant', 'points' => 22, 'description' => 'Structure adéquate avec quelques erreurs mineures'],
                    ['label' => 'Acceptable',   'points' => 15, 'description' => 'Structure partielle, plusieurs erreurs'],
                    ['label' => 'Insuffisant',  'points' => 5,  'description' => 'Structure absente ou incorrecte'],
                ]),
            ],
            [
                'evaluation_id' => 1,
                'titre'         => 'Mise en forme CSS',
                'description'   => 'Application des styles CSS et mise en page.',
                'ordre'         => 2,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 40, 'description' => 'Mise en page soignée, responsive et créative'],
                    ['label' => 'Satisfaisant', 'points' => 30, 'description' => 'Mise en page fonctionnelle avec quelques lacunes'],
                    ['label' => 'Acceptable',   'points' => 20, 'description' => 'Styles de base appliqués'],
                    ['label' => 'Insuffisant',  'points' => 8,  'description' => 'Peu ou pas de styles'],
                ]),
            ],
            [
                'evaluation_id' => 1,
                'titre'         => 'Qualité du code',
                'description'   => 'Lisibilité, indentation et commentaires.',
                'ordre'         => 3,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 30, 'description' => 'Code propre, bien indenté et commenté'],
                    ['label' => 'Satisfaisant', 'points' => 22, 'description' => 'Code lisible avec quelques irrégularités'],
                    ['label' => 'Acceptable',   'points' => 15, 'description' => 'Code fonctionnel mais peu lisible'],
                    ['label' => 'Insuffisant',  'points' => 5,  'description' => 'Code difficile à lire'],
                ]),
            ],

            // ── Eval 2 : TP2 JavaScript ───────────────────────────────────────
            [
                'evaluation_id' => 2,
                'titre'         => 'Manipulation du DOM',
                'description'   => 'Sélection et modification des éléments HTML via JavaScript.',
                'ordre'         => 1,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 35, 'description' => 'Manipulation complète et efficace du DOM'],
                    ['label' => 'Satisfaisant', 'points' => 26, 'description' => 'Manipulation adéquate avec quelques erreurs'],
                    ['label' => 'Acceptable',   'points' => 17, 'description' => 'Manipulation basique fonctionnelle'],
                    ['label' => 'Insuffisant',  'points' => 5,  'description' => 'Manipulation absente ou non fonctionnelle'],
                ]),
            ],
            [
                'evaluation_id' => 2,
                'titre'         => 'Gestion des événements',
                'description'   => 'Utilisation des écouteurs d\'événements.',
                'ordre'         => 2,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 35, 'description' => 'Événements bien gérés et découplés'],
                    ['label' => 'Satisfaisant', 'points' => 26, 'description' => 'Gestion fonctionnelle des événements principaux'],
                    ['label' => 'Acceptable',   'points' => 17, 'description' => 'Quelques événements gérés'],
                    ['label' => 'Insuffisant',  'points' => 5,  'description' => 'Peu ou pas d\'événements gérés'],
                ]),
            ],
            [
                'evaluation_id' => 2,
                'titre'         => 'Logique et algorithmes',
                'description'   => 'Qualité de la logique de programmation.',
                'ordre'         => 3,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 30, 'description' => 'Logique claire, efficace et sans bogues'],
                    ['label' => 'Satisfaisant', 'points' => 22, 'description' => 'Logique correcte avec quelques bogues mineurs'],
                    ['label' => 'Acceptable',   'points' => 15, 'description' => 'Logique partielle avec bogues'],
                    ['label' => 'Insuffisant',  'points' => 5,  'description' => 'Logique incorrecte ou absente'],
                ]),
            ],

            // ── Eval 3 : Examen final INF3135 ─────────────────────────────────
            [
                'evaluation_id' => 3,
                'titre'         => 'Connaissance théorique',
                'description'   => 'Maîtrise des concepts vus en cours.',
                'ordre'         => 1,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 50, 'description' => 'Concepts maîtrisés et bien expliqués'],
                    ['label' => 'Satisfaisant', 'points' => 38, 'description' => 'Bonne compréhension générale'],
                    ['label' => 'Acceptable',   'points' => 25, 'description' => 'Compréhension partielle'],
                    ['label' => 'Insuffisant',  'points' => 10, 'description' => 'Compréhension insuffisante'],
                ]),
            ],
            [
                'evaluation_id' => 3,
                'titre'         => 'Application pratique',
                'description'   => 'Capacité à appliquer les concepts en situation.',
                'ordre'         => 2,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 50, 'description' => 'Application correcte et créative'],
                    ['label' => 'Satisfaisant', 'points' => 38, 'description' => 'Application correcte dans la majorité des cas'],
                    ['label' => 'Acceptable',   'points' => 25, 'description' => 'Application partielle'],
                    ['label' => 'Insuffisant',  'points' => 10, 'description' => 'Application incorrecte ou absente'],
                ]),
            ],

            // ── Eval 4 : TP1 INF3180 ─────────────────────────────────────────
            [
                'evaluation_id' => 4,
                'titre'         => 'Diagramme entité-relation',
                'description'   => 'Qualité du schéma ER produit.',
                'ordre'         => 1,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 50, 'description' => 'Schéma complet, sans erreur et bien normalisé'],
                    ['label' => 'Satisfaisant', 'points' => 38, 'description' => 'Schéma adéquat avec quelques manques'],
                    ['label' => 'Acceptable',   'points' => 25, 'description' => 'Schéma partiel'],
                    ['label' => 'Insuffisant',  'points' => 8,  'description' => 'Schéma absent ou très incomplet'],
                ]),
            ],
            [
                'evaluation_id' => 4,
                'titre'         => 'Normalisation',
                'description'   => 'Application des formes normales.',
                'ordre'         => 2,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 50, 'description' => 'Normalisation jusqu\'en 3FN correctement appliquée'],
                    ['label' => 'Satisfaisant', 'points' => 38, 'description' => 'Normalisation partielle correcte'],
                    ['label' => 'Acceptable',   'points' => 25, 'description' => 'Quelques concepts de normalisation appliqués'],
                    ['label' => 'Insuffisant',  'points' => 8,  'description' => 'Normalisation absente ou incorrecte'],
                ]),
            ],

            // ── Eval 5 : TP2 INF3180 ─────────────────────────────────────────
            [
                'evaluation_id' => 5,
                'titre'         => 'Requêtes de base',
                'description'   => 'SELECT, INSERT, UPDATE, DELETE.',
                'ordre'         => 1,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 40, 'description' => 'Toutes les requêtes correctes et optimisées'],
                    ['label' => 'Satisfaisant', 'points' => 30, 'description' => 'La majorité des requêtes correctes'],
                    ['label' => 'Acceptable',   'points' => 20, 'description' => 'Requêtes de base fonctionnelles'],
                    ['label' => 'Insuffisant',  'points' => 8,  'description' => 'Peu de requêtes fonctionnelles'],
                ]),
            ],
            [
                'evaluation_id' => 5,
                'titre'         => 'Requêtes avancées',
                'description'   => 'JOIN, sous-requêtes, agrégations.',
                'ordre'         => 2,
                'niveaux'       => json_encode([
                    ['label' => 'Excellent',    'points' => 60, 'description' => 'Requêtes complexes correctes et efficaces'],
                    ['label' => 'Satisfaisant', 'points' => 45, 'description' => 'La plupart des requêtes avancées correctes'],
                    ['label' => 'Acceptable',   'points' => 30, 'description' => 'Quelques requêtes avancées fonctionnelles'],
                    ['label' => 'Insuffisant',  'points' => 10, 'description' => 'Requêtes avancées absentes ou incorrectes'],
                ]),
            ],
        ];

        foreach ($criteres as $critere) {
            DB::table('criteres')->insert([
                ...$critere,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
