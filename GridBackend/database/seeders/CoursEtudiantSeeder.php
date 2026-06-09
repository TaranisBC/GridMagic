<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursEtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cours 1 (INF3135) — 8 étudiants
        $cours1 = ['20210001', '20210002', '20210003', '20210004',
            '20210005', '20210006', '20210007', '20210008'];

        foreach ($cours1 as $no) {
            DB::table('cours_etudiant')->insert([
                'cours_id'     => 1,
                'no_etudiant'  => $no,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

        // Cours 2 (INF3180) — 6 étudiants dont certains partagés avec cours 1
        $cours2 = ['20210001', '20210003', '20210005',
            '20220001', '20220002', '20220003'];

        foreach ($cours2 as $no) {
            DB::table('cours_etudiant')->insert([
                'cours_id'     => 2,
                'no_etudiant'  => $no,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

        // Cours 3 archivé (INF2120) — 4 étudiants
        $cours3 = ['20220001', '20220002', '20220003', '20220004'];

        foreach ($cours3 as $no) {
            DB::table('cours_etudiant')->insert([
                'cours_id'     => 3,
                'no_etudiant'  => $no,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }

}
