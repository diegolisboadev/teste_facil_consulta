<?php

namespace App\Repositories\Eloquent;

use App\Models\Medico;
use App\Repositories\Contracts\IMedicoRepository;

class MedicoRepository extends AbstractRepository implements IMedicoRepository
{
    protected $model = Medico::class;
}
