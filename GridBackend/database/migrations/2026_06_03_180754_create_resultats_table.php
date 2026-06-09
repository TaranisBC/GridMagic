<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('critere_id')->constrained()->onDelete('cascade');
            $table->string('no_etudiant');
            $table->foreign('no_etudiant')->references('no_etudiant')->on('etudiants')->onDelete('cascade');
            $table->integer('niveau_index')->nullable();
            $table->float('points_obtenus')->nullable();
            $table->text('commentaire')->nullable();
            $table->timestamps();

            $table->unique(['critere_id', 'no_etudiant']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats');
    }
};
