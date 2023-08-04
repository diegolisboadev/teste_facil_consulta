<?php

namespace App\DTO;

class CidadeDto
{
    public function __construct(
        public readonly string $nome,
        public readonly float $estado
    ) {
    }
}
