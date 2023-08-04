<?php

namespace App\Services;

use App\DTO\MedicoDto;
use App\Repositories\Contracts\IMedicoRepository;
use App\Services\Contracts\IMedicoService;
use Illuminate\Support\Facades\DB;

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
        DB::transaction(function () use ($medicoDto) {
            return $this->medicoRepository->create([
                'nome' => $medicoDto->nome,
                'estado' => $medicoDto->especialidade,
                'cidade_id' => $medicoDto->cidade

            ]);
        });
    }

    public function updateMedico(int $id, MedicoDto $medicoDto)
    {
        DB::transaction(function () use ($medicoDto, $id) {
            return $this->medicoRepository->update(
                [
                    'nome' => $medicoDto->nome,
                    'estado' => $medicoDto->especialidade,
                    'cidade_id' => $medicoDto->cidade
                ],
                $id
            );
        });
    }

    public function deleteMedico(int $id)
    {
        DB::transaction(function () use ($id) {
            return $this->medicoRepository->delete($id);
        });
    }
}
