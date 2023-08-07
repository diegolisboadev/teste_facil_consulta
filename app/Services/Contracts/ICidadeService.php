<?php

namespace App\Services\Contracts;

use App\DTO\CidadeDto;

interface ICidadeService
{
    public function findAllCidades();
    public function findCidade(int $id);
    public function createCidade(CidadeDto $cidadeDto);
    public function updateCidade(int $id, CidadeDto $cidadeDto);
    public function deleteCidade(int $id);
    public function getDoctorsByCity(int $id);
}
