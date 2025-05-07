<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\ConvenioService;

class ConvenioController extends Controller
{
    public function __construct(
        private readonly ConvenioService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->all());
    }

    public function show(string $id): JsonResponse
    {
        $convenio = $this->service->find($id);

        if (!$convenio) {
            return response()->json(['error' => 'Convênio não encontrado'], 404);
        }

        return response()->json($convenio);
    }
}
