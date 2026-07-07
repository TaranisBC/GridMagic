<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CorrectionGeneraleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'evaluation_id' => $this->evaluation_id,
            'no_etudiant' => $this->no_etudiant,
            'commentaire' => $this->commentaire_general
        ];
    }
}
