<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\InstituicaoService;

class InstituicaoController extends Controller
{
    public function __construct(
        private readonly InstituicaoService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->all());
    }

    public function show(string $id): JsonResponse
    {
        $instituicao = $this->service->find($id);

        if (!$instituicao) {
            return response()->json(['error' => 'Instituição não encontrada'], 404);
        }

        return response()->json($instituicao);
    }
}
