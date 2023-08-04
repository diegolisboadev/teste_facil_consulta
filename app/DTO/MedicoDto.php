<?php

namespace App\DTO;

class MedicoDto
{
    public function __construct(
        public readonly string $nome,
        public readonly float $especialidade,
        public readonly string $cidade,
    ) {
    }
}
