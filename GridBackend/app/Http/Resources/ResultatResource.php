<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'no_etudiant'    => $this->no_etudiant,
            'critere_id'     => $this->critere_id,
            'niveau_index'   => $this->niveau_index,
            'points_obtenus' => $this->points_obtenus,
            'commentaire'    => $this->commentaire,
        ];
    }
}
