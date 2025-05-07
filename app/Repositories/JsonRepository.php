<?php

namespace App\Repositories;

class JsonRepository
{
    private function readJson(string $filename): array
    {
        $path = storage_path("app/data/{$filename}");

        if (!file_exists($path)) {
            return [];
        }

        return json_decode(file_get_contents($path), true);
    }

    public function getInstituicoes(): array
    {
        return $this->readJson('instituicoes.json');
    }

    public function getConvenios(): array
    {
        return $this->readJson('convenios.json');
    }

    public function getTaxas(): array
    {
        return $this->readJson('taxas_instituicoes.json');
    }
}
