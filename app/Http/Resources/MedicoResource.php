<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'estado' => $this->especialidade,
            'cidade' => $this->cidade,
            'data_criacao' => $this->created_at->format('Y-m-d h:i:s'),
            'data_atualizacao' => $this->updated_at->format('Y-m-d h:i:s')
        ];
    }
}
