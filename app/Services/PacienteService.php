<?php

namespace App\Services;

use App\DTO\PacienteDto;
use App\Repositories\Contracts\IPacienteRepository;
use App\Services\Contracts\IPacienteService;
use Illuminate\Support\Facades\DB;

class PacienteService implements IPacienteService
{
    public function __construct(private IPacienteRepository $pacienteRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
    }

    public function findAllPacientes()
    {
        return $this->pacienteRepository->findAll();
    }

    public function findPaciente(int $id)
    {
        return $this->pacienteRepository->findById($id);
    }

    public function createPaciente(PacienteDto $pacienteDto)
    {
        DB::transaction(function () use ($pacienteDto) {
            return $this->pacienteRepository->create([
                'nome' => $pacienteDto->nome,
                'cpf' => $pacienteDto->cpf,
                'celular' => $pacienteDto->celular
            ]);
        });
    }

    public function updatePaciente(int $id, PacienteDto $pacienteDto)
    {
        DB::transaction(function () use ($pacienteDto, $id) {
            return $this->pacienteRepository->update(
                [
                    'nome' => $pacienteDto->nome,
                    'cpf' => $pacienteDto->cpf,
                    'celular' => $pacienteDto->celular
                ],
                $id
            );
        });
    }

    public function deletePaciente(int $id)
    {
        DB::transaction(function () use ($id) {
            return $this->pacienteRepository->delete($id);
        });
    }
}
