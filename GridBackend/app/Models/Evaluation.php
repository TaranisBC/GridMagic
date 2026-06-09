<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['titre', 'description', 'ponderation', 'points_total', 'cours_id'])]
class Evaluation extends Model
{
    /** @use HasFactory<\Database\Factories\EvaluationFactory> */
    use HasFactory;

    public function cours(): BelongsTo {
        return $this->belongsTo(Cours::class);
    }

    public function criteres(): HasMany {
        return $this->hasMany(Critere::class);
    }

    public function commentaires(): HasMany {
        return $this->hasMany(CorrectionGenerale::class);
    }

}
