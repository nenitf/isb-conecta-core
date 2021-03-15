<?php

namespace Core\Models\Recepcao;

use Core\Models\Telefone;
use Core\Models\Usuario\Usuario;
use Core\Models\Recepcao\LocalAtendimento;

class Atendimento
{
    public ?int $id;
    public Usuario $usuario;
    public \DateTime $data;
    public LocalAtendimento $onde;
    public string $nomePessoaAtendida;
    public Telefone $contato;
    public string $relato;

    public function __construct(
        $id,
        $usuario,
        $data,
        $onde,
        $nomePessoaAtendida,
        $contato,
        $relato
    ) {
        $this->usuario = $usuario;
        $this->data = $data = $data;
        $this->onde = $onde;
        $this->nomePessoaAtendida = $nomePessoaAtendida;
        $this->contato = $contato;
        $this->relato = $relato;
    }
}
