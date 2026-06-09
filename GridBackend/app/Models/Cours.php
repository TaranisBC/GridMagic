<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[Fillable(['titre', 'description', 'code', 'semestre', 'user_id', 'archive'])]
class Cours extends Model
{
    /** @use HasFactory<\Database\Factories\CoursFactory> */
    use HasFactory;

    protected $table = 'cours';

    // Dans Cours.php
    public function etudiants(): BelongsToMany {
        return $this->belongsToMany(Etudiant::class, 'cours_etudiant', 'cours_id', 'no_etudiant');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function evaluations(): HasMany {
        return $this->hasMany(Evaluation::class);
    }
}
