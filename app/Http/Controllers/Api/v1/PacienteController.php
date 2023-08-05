<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\PacienteDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteRequest;
use App\Http\Resources\PacienteCollection;
use App\Http\Resources\PacienteResource;
use App\Services\PacienteService;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct(private PacienteService $pacienteService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PacienteCollection($this->pacienteService->findAllPacientes());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PacienteRequest $request)
    {
        return new PacienteResource($this->pacienteService->createPaciente(
            new PacienteDto($request->nome, $request->cpf, $request->celular)
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return new PacienteResource(
            $this->pacienteService->updatePaciente(
                $id,
                new PacienteDto($request->nome, $request->cpf, $request->celular)
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
