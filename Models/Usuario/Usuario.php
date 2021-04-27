<?php

namespace Core\Models\Usuario;

class Usuario
{
    protected ?int $id;
    protected string $nome;
    protected string $senha; // criptografada

    public function __construct(
        $id,
        $nome,
        $senha
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }
}
