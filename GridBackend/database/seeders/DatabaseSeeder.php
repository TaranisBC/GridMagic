<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EtudiantSeeder::class,
            CoursSeeder::class,
            CoursEtudiantSeeder::class,
            EvaluationSeeder::class,
            CritereSeeder::class,
            ResultatSeeder::class,
            CorrectionGeneraleSeeder::class,
        ]);
    }
}
