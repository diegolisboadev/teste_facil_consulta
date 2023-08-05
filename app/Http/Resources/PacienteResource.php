<?php

namespace App\Http\Resources;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
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
    public $collects = Paciente::class;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'celular' => $this->celular,
            'data_criacao' => $this->created_at->format('d/m/Y h:i:s'),
            'data_atualizacao' => $this->updated_at->format('d/m/Y h:i:s')
        ];
    }
}
