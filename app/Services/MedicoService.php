<?php

namespace App\Services;

use App\DTO\MedicoDto;
use App\Repositories\Contracts\IMedicoRepository;
use App\Services\Contracts\IMedicoService;
use Illuminate\Support\Facades\DB;
use Throwable;

class MedicoService implements IMedicoService
{
    public function __construct(private IMedicoRepository $medicoRepository)
    {
        $this->medicoRepository = $medicoRepository;
    }

    public function findAllMedicos()
    {
        return $this->medicoRepository->findAll();
    }

    public function findMedico(int $id)
    {
        return $this->medicoRepository->findById($id);
    }

    public function createMedico(MedicoDto $medicoDto)
    {
        DB::beginTransaction();
        try {
            return $this->medicoRepository->create([
                'nome' => $medicoDto->nome,
                'especialidade' => $medicoDto->especialidade,
                'cidade_id' => $medicoDto->cidade
            ]);
            DB::commit();
        } catch (Throwable) {
            DB::rollBack();
            return response()->json(['data' => ['status' => 500, 'error' => 'Erro na Inserção!']], 500);
        }
    }

    public function updateMedico(int $id, MedicoDto $medicoDto)
    {
    }

    public function deleteMedico(int $id)
    {
    }
}
