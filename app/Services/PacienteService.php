<?php

namespace App\Services;

use App\DTO\PacienteDto;
use App\Repositories\Contracts\IPacienteRepository;
use App\Services\Contracts\IPacienteService;
use Illuminate\Support\Facades\DB;
use Throwable;

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
        DB::beginTransaction();
        try {
            return $this->pacienteRepository->create([
                'nome' => $pacienteDto->nome,
                'cpf' => $pacienteDto->cpf,
                'celular' => $pacienteDto->celular
            ]);
            DB::commit();
        } catch (Throwable) {
            DB::rollBack();
            return response()->json(['data' => ['status' => 500, 'error' => 'Erro na Inserção!']], 500);
        }
    }

    public function updatePaciente(int $id, PacienteDto $pacienteDto)
    {
        try {
            return $this->pacienteRepository->update(
                [
                    'nome' => $pacienteDto->nome,
                    'cpf' => $pacienteDto->cpf,
                    'celular' => $pacienteDto->celular
                ],
                $id
            );
        } catch (Throwable) {
            return response()->json(['data' => ['status' => 500, 'error' => 'Erro na Atualização!']], 500);
        }
    }

    public function deletePaciente(int $id)
    {
    }
}
