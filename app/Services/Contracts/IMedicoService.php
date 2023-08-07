<?php

namespace App\Services\Contracts;

use App\DTO\MedicoDto;
use App\DTO\MedicoPacienteDto;

interface IMedicoService
{
    public function findAllMedicos();
    public function findMedico(int $id);
    public function createMedico(MedicoDto $medicoDto);
    public function updateMedico(int $id, MedicoDto $medicoDto);
    public function deleteMedico(int $id);
    public function createPacientAndDoctor(MedicoPacienteDto $medicoPacienteDto, int $id);
    public function getDoctorsByPacient(int $id);
}
