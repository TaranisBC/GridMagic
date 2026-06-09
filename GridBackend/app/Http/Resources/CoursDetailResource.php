<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursDetailResource extends JsonResource
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
            'code'        => $this->code,
            'description' => $this->description,
            'semestre'    => $this->semestre,
            'archive'     => $this->archive,
            'etudiants'   => EtudiantResource::collection($this->whenLoaded('etudiants')),
            'evaluations' => EvaluationResource::collection($this->whenLoaded('evaluations')),
        ];
    }
}
