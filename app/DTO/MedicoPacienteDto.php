<?php

namespace App\DTO;

class MedicoPacienteDto
{
    public function __construct(
        public readonly int $medico_id,
        public readonly int $paciente_id
    ) {
    }
}
