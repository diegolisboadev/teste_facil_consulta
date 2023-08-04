<?php

namespace App\Services\Contracts;

use App\DTO\MedicoDto;

interface IMedicoService
{
    public function findAllMedicos();
    public function findMedico(int $id);
    public function createMedico(MedicoDto $medicoDto);
    public function updateMedico(int $id, MedicoDto $medicoDto);
    public function deleteMedico(int $id);
}
