<?php

namespace Core\Models;

use Core\Exceptions\Validations\ValidationException;

class Setor
{
    protected ?int $id;
    protected string $nome;

    public function __construct(
        $id,
        $nome
    ) {
        $this->id = $id;
        $this->nome = $nome;
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
