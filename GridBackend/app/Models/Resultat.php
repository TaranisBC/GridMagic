<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    /** @use HasFactory<\Database\Factories\ResultatFactory> */
    use HasFactory;

    public function critere() {
        return $this->belongsTo(Critere::class);
    }

    public function etudiant() {
        return $this->belongsTo(Etudiant::class, 'no_etudiant', 'no_etudiant');
    }
}
