<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['evaluation_id','titre', 'description', 'ordre', 'niveaux'])]
class Critere extends Model
{
    /** @use HasFactory<\Database\Factories\CritereFactory> */
    use HasFactory;
    protected $casts = [
        'niveaux' => 'array',
    ];

    public function evaluation(): BelongsTo {
        return $this->belongsTo(Evaluation::class);
    }

    public function resultats() {
        return $this->hasMany(Resultat::class);
    }
}
