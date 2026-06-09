<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nom', 'prenom', 'no_etudiant'])]
class Etudiant extends Model
{
    /** @use HasFactory<\Database\Factories\EtudiantFactory> */
    use HasFactory;

    protected $primaryKey = 'no_etudiant';
    protected $keyType = 'string';
    public $incrementing = false;

    public function cours(): BelongsToMany {
        return $this->belongsToMany(Cours::class, 'cours_etudiant', 'no_etudiant', 'cours_id');
    }

    public function resultats(): HasMany {
        return $this->hasMany(Resultat::class, 'no_etudiant', 'no_etudiant');
    }

    public function commentaires(): HasMany {
        return $this->hasMany(CorrectionGenerale::class, 'no_etudiant', 'no_etudiant');
    }

}
