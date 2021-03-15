<?php

namespace Core\Models\Recepcao;

class LocalAtendimento
{
    public ?int $id;
    public string $descricao;

    public function __construct($id, $descricao)
    {
        $this->id = $id;
        $this->descricao = $descricao;
    }
}
