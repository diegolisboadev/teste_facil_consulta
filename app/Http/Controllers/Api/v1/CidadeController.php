<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
use App\Http\Resources\CidadesCollection;
use App\Http\Resources\MedicoCollection;
use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public function __construct(private CidadeService $cidadeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CidadesCollection($this->cidadeService->findAllCidades());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CidadeRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    /**
     * Retorna todas os medicos de uma determinada cidade
     */
    public function getMedicosPorCidade(int $id_cidade)
    {
        return new MedicoCollection($this->cidadeService->getDoctorsByCity($id_cidade));
    }
}
