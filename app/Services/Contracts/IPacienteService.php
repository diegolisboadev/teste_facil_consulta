<?php

namespace App\Services\Contracts;

use App\DTO\PacienteDto;

interface IPacienteService
{
    public function findAllPacientes();
    public function findPaciente(int $id);
    public function createPaciente(PacienteDto $pacienteDto);
    public function updatePaciente(int $id, PacienteDto $pacienteDto);
    public function deletePaciente(int $id);
}
