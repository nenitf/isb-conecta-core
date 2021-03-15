<?php

namespace Core\Models\Usuario;

class Usuario
{
    public ?int $id;
    public string $nome;

    public function __construct(
        $id,
        $nome
    )
    {
        $this->id = $id;
        $this->nome = $nome;
    }
}
