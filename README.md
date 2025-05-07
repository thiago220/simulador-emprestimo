# Simulador de Empréstimo · API RESTful (Nível 3)

Este é um projeto de API REST construída com Laravel 12 seguindo os princípios de **Clean Architecture** e **SOLID**.  
A aplicação permite simular empréstimos com base em instituições financeiras, convênios e taxas configuradas via arquivos JSON.

---

## Funcionalidades

- Listar instituições financeiras
- Listar convênios disponíveis
- Simular empréstimos com taxa de juros e parcelas
- Filtrar simulação por instituição, convênio e quantidade de parcelas
- Arquitetura REST nível 3 com respostas HATEOAS

---

## Instalação

```bash
git clone https://github.com/seu-usuario/simulador-emprestimo.git
cd simulador-emprestimo

composer install

cp .env.example .env
php artisan key:generate

php artisan serve
```

---

## Endpoints da API

### `GET /api/v1/instituicoes`
Lista todas as instituições disponíveis.

### `GET /api/v1/instituicoes/{id}`
Retorna uma instituição específica.

### `GET /api/v1/convenios`
Lista todos os convênios disponíveis.

### `GET /api/v1/convenios/{id}`
Retorna um convênio específico.

### `POST /api/v1/simulacoes`
Simula um empréstimo.

#### Corpo da requisição:
```json
{
  "valor_emprestimo": 10000,
  "instituicoes": ["BMG"],
  "convenios": ["INSS"],
  "parcela": 72
}
```

#### Exemplo de resposta:
```json
[
  {
    "instituicao": "BMG",
    "convenio": "INSS",
    "parcelas": 72,
    "taxaJuros": 2.05,
    "valor_parcela": 260.4,
    "_links": {
      "instituicao": "/api/instituicoes/BMG",
      "convenio": "/api/convenios/INSS"
    }
  }
]
```

---

## Testes com Postman

Importe o arquivo `simulador-emprestimo.postman_collection.json` no Postman para testar todas as rotas.

---

## Arquitetura

- `Controllers` → Entrada HTTP
- `Services` → Lógica de negócio
- `DTOs` → Objeto de transporte de dados
- `Repositories` → Acesso aos dados JSON
- `routes/api.php` → Rotas RESTful nível 3 com versionamento e separação de responsabilidades

---

## Dados usados (mock)

Os arquivos JSON usados estão no diretório `storage/app/data/`:

- `instituicoes.json`
- `convenios.json`
- `taxas_instituicoes.json`

---

## Licença

MIT © 2024 — Criado por Thiago Souza Dias
