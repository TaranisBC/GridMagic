<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CritereResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'titre'         => $this->titre,
            'description'   => $this->description,
            'ordre'         => $this->ordre,
            'niveaux'       => $this->niveaux,
            'evaluation_id' => $this->evaluation_id,
        ];
    }
}
