<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursResource extends JsonResource
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
            'titre' => $this->titre,
            'description' => $this->description,
            'code' => $this->code,
            'semestre' => $this->semestre,
            'archive' => $this->archive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
