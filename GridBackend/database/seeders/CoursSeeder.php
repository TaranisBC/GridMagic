<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cours = [
            [
                'titre'       => 'Programmation Web',
                'code'        => 'INF3135',
                'description' => 'Introduction au développement web avec HTML, CSS et JavaScript.',
                'semestre'    => 'H2025',
                'archive'     => false,
                'user_id'     => 1,
            ],
            [
                'titre'       => 'Bases de données',
                'code'        => 'INF3180',
                'description' => 'Conception et exploitation de bases de données relationnelles.',
                'semestre'    => 'H2025',
                'archive'     => false,
                'user_id'     => 1,
            ],
            [
                'titre'       => 'Structure de données',
                'code'        => 'INF2120',
                'description' => 'Algorithmes et structures de données fondamentales.',
                'semestre'    => 'A2024',
                'archive'     => true,
                'user_id'     => 1,
            ],
        ];

        foreach ($cours as $c) {
            DB::table('cours')->insert([
                ...$c,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
