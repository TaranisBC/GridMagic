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
        Schema::create('correction_generales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_id')->constrained()->onDelete('cascade');
            $table->string('no_etudiant');
            $table->foreign('no_etudiant')->references('no_etudiant')->on('etudiants')->onDelete('cascade');
            $table->text('commentaire_general')->nullable();
            $table->timestamps();

            $table->unique(['evaluation_id', 'no_etudiant']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correction_generales');
    }
};
