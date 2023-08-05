<?php

namespace App\DTO;

class PacienteDto
{
    public function __construct(
        public readonly string $nome,
        public readonly string $cpf,
        public readonly string $celular
    ) {
    }
}
