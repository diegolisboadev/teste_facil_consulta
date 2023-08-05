<?php

namespace App\DTO;

class MedicoDto
{
    public function __construct(
        public readonly string $nome,
        public readonly string $especialidade,
        public readonly string $cidade,
    ) {
    }
}
