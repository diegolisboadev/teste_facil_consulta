<?php

namespace App\Repositories\Eloquent;

use App\Models\Cidade;
use App\Models\Paciente;
use App\Repositories\Contracts\IPacienteRepository;

class PacienteRepository extends AbstractRepository implements IPacienteRepository
{
    protected $model = Paciente::class;
}
