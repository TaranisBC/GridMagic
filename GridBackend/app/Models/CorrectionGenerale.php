<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['evaluation_id', 'no_etudiant', 'commentaire_general'])]
class CorrectionGenerale extends Model
{
    /** @use HasFactory<\Database\Factories\CorrectionGeneraleFactory> */
    use HasFactory;

    public function etudiant(): BelongsTo {
        return $this->belongsTo(Etudiant::class);
    }

    public function evaluation(): BelongsTo {
        return $this->belongsTo(Evaluation::class);
    }
}
