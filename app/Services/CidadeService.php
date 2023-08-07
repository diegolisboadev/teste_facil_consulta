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
    }

    public function updateCidade(int $id, CidadeDto $cidadeDto)
    {
    }

    public function deleteCidade(int $id)
    {
    }

    public function getDoctorsByCity(int $id)
    {
        return $this->cidadeRepository->getRelationship('medico')->findOrFail($id);
    }
}
