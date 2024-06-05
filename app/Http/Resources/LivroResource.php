<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
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
            'titulo' => strtoupper($this->titulo),
            'descricao' => $this->descricao,
            'autor' => new AutorResource($this->whenLoaded('autor')),
            'autor_id' => $this->autor_id,
            'editora_id' => $this->editora_id,
            'editora' => new EditoraResource($this->whenLoaded('editora')),
            'publicado_em' => Carbon::make($this->publicado_em)->format('d/m/Y'),
            'created' => Carbon::make($this->created_at)->format('Y-m-d')
        ];
    }
}
