<?php

namespace Core\Models\Recepcao;

class LocalAtendimento
{
    protected ?int $id;
    protected string $descricao;

    public function __construct($id, $descricao)
    {
        $this->id = $id;
        $this->descricao = $descricao;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }
}
