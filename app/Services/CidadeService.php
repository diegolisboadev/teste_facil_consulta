<?php

namespace App\Services;

use App\DTO\CidadeDto;
use App\Repositories\Contracts\ICidadeRepository;
use App\Services\Contracts\ICidadeService;
use Illuminate\Support\Facades\DB;

class CidadeService implements ICidadeService
{
    public function __construct(private ICidadeRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }

    public function findAllCidades()
    {
        return $this->cidadeRepository->findAll();
    }

    public function findCidade(int $id)
    {
        return $this->cidadeRepository->findById($id);
    }

    public function createCidade(CidadeDto $cidadeDto)
    {
        DB::transaction(function () use ($cidadeDto) {
            return $this->cidadeRepository->create([
                'nome' => $cidadeDto->nome,
                'estado' => $cidadeDto->estado
            ]);
        });
    }

    public function updateCidade(int $id, CidadeDto $cidadeDto)
    {
        DB::transaction(function () use ($cidadeDto, $id) {
            return $this->cidadeRepository->update(
                [
                    'nome' => $cidadeDto->nome,
                    'estado' => $cidadeDto->estado
                ],
                $id
            );
        });
    }

    public function deleteCidade(int $id)
    {
        DB::transaction(function () use ($id) {
            return $this->cidadeRepository->delete($id);
        });
    }
}
