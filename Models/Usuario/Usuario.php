<?php

namespace Core\Models\Usuario;

class Usuario
{
    public ?int $id;
    public string $nome;
    public string $senha;

    public function __construct(
        $id,
        $nome,
        $senha
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
    }
}
