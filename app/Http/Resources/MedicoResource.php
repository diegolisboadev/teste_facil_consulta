<?php

namespace App\Http\Resources;

use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;

    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = Medico::class;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'especialidade' => $this->especialidade,
            'cidade' => $this->cidades->nome,
            'data_criacao' => $this->created_at->format('d/m/Y h:i:s'),
            'data_atualizacao' => $this->updated_at->format('d/m/Y h:i:s')
        ];
    }
}
