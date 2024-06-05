<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
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
            'nome' => strtoupper($this->nome),
            'biografia' => $this->biografia,
            'data_nascimento' => Carbon::make($this->data_nascimento)->format('d/m/Y'),
            'created' => Carbon::make($this->created_at)->format('Y-m-d')
        ];
    }
}
