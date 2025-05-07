<?php

namespace App\Services;

use App\Repositories\JsonRepository;
use App\DTOs\SimulacaoRequestDTO;

class SimulacaoService
{
    public function __construct(
        private readonly JsonRepository $repo
    ) {}

    public function simular(SimulacaoRequestDTO $dto): array
    {
        $taxas = $this->repo->getTaxas();
        $resultado = [];

        foreach ($taxas as $item) {
            if (
                (!$dto->instituicoes || in_array($item['instituicao'], $dto->instituicoes)) &&
                (!$dto->convenios || in_array($item['convenio'], $dto->convenios)) &&
                (!$dto->parcela || $item['parcelas'] == $dto->parcela)
            ) {
                $valorParcela = round($dto->valor_emprestimo * $item['coeficiente'], 2);
                $resultado[] = [
                    'instituicao' => $item['instituicao'],
                    'convenio' => $item['convenio'],
                    'parcelas' => $item['parcelas'],
                    'taxaJuros' => $item['taxaJuros'],
                    'valor_parcela' => $valorParcela,
                    '_links' => [
                        'instituicao' => '/api/v1/instituicoes/' . $item['instituicao'],
                        'convenio' => '/api/v1/convenios/' . $item['convenio'],
                    ]
                ];
            }
        }

        return $resultado;
    }
}
