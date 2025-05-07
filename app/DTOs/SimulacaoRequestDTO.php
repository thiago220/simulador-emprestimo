<?php

namespace App\DTOs;

class SimulacaoRequestDTO
{
    public float $valor_emprestimo;
    public ?array $instituicoes;
    public ?array $convenios;
    public ?int $parcela;

    public function __construct(array $data)
    {
        $this->valor_emprestimo = $data['valor_emprestimo'];
        $this->instituicoes = $data['instituicoes'] ?? null;
        $this->convenios = $data['convenios'] ?? null;
        $this->parcela = $data['parcela'] ?? null;
    }
}
