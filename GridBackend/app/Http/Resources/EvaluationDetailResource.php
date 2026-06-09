<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'titre'       => $this->titre,
            'description' => $this->description,
            'ponderation' => $this->ponderation,
            'points_total'=> $this->points_total,
            'date'        => $this->date,
            'cours_id'    => $this->cours_id,
            'criteres'    => CritereResource::collection($this->whenLoaded('criteres')),
            'etudiants'   => EtudiantResource::collection($this->whenLoaded('cours')?->etudiants ?? []),
        ];
    }
}
