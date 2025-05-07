<?php

namespace App\Services;

use App\Repositories\JsonRepository;

class InstituicaoService
{
    public function __construct(
        private readonly JsonRepository $repo
    ) {}

    public function all(): array
    {
        return array_column($this->repo->getInstituicoes(), 'valor', 'chave');
    }

    public function find(string $id): ?array
    {
        foreach ($this->repo->getInstituicoes() as $item) {
            if ($item['chave'] === $id) {
                return $item;
            }
        }

        return null;
    }
}
