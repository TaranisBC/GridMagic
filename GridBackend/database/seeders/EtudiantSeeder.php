<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            ['no_etudiant' => '20210001', 'nom' => 'Tremblay',   'prenom' => 'Marie'],
            ['no_etudiant' => '20210002', 'nom' => 'Côté',       'prenom' => 'Jean'],
            ['no_etudiant' => '20210003', 'nom' => 'Gagnon',     'prenom' => 'Sophie'],
            ['no_etudiant' => '20210004', 'nom' => 'Bouchard',   'prenom' => 'Luc'],
            ['no_etudiant' => '20210005', 'nom' => 'Gauthier',   'prenom' => 'Emma'],
            ['no_etudiant' => '20210006', 'nom' => 'Morin',      'prenom' => 'Alexis'],
            ['no_etudiant' => '20210007', 'nom' => 'Lavoie',     'prenom' => 'Camille'],
            ['no_etudiant' => '20210008', 'nom' => 'Fortin',     'prenom' => 'Nicolas'],
            ['no_etudiant' => '20220001', 'nom' => 'Ouellet',    'prenom' => 'Jade'],
            ['no_etudiant' => '20220002', 'nom' => 'Bergeron',   'prenom' => 'Thomas'],
            ['no_etudiant' => '20220003', 'nom' => 'Pelletier',  'prenom' => 'Léa'],
            ['no_etudiant' => '20220004', 'nom' => 'Leblanc',    'prenom' => 'Samuel'],
        ];

        foreach ($etudiants as $etudiant) {
            DB::table('etudiants')->insert([
                ...$etudiant,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
