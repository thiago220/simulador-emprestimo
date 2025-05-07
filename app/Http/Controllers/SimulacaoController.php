<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\DTOs\SimulacaoRequestDTO;
use App\Services\SimulacaoService;

class SimulacaoController extends Controller
{
    public function __construct(
        private readonly SimulacaoService $service
    ) {}

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'valor_emprestimo' => 'required|numeric',
            'instituicoes' => 'nullable|array',
            'convenios' => 'nullable|array',
            'parcela' => 'nullable|integer',
        ]);

        $dto = new SimulacaoRequestDTO($validated);
        $resultado = $this->service->simular($dto);

        return response()->json($resultado);
    }
}
