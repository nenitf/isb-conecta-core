<?php

namespace Core\Models\Usuario;

use Core\Models\{
    Email,
    Setor,
};

class Usuario
{
    protected ?int $id;
    protected string $nome;
    protected string $ativo;
    protected string $senha; // criptografada
    public Email $email;
    public Setor $setor;

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

    public function ativaUsuario() {
        $this->ativo = true;
        return $this;
    }

    public function inativaUsuario() {
        $this->ativo = false;
        return $this->senha;
    }

    public function getAtivo() {
        return $this->ativo;
    }
}
