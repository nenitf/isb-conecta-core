<?php

namespace Core\Models\Recepcao;

use Core\Models\Telefone;
use Core\Models\Usuario\Usuario;
use Core\Models\Recepcao\LocalAtendimento;

use Core\Exceptions\Validations\{
    NotPresentException,
};

class Atendimento
{
    protected ?int $id;
    private Usuario $usuario;
    public \DateTime $data;
    private LocalAtendimento $onde;
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
        $this->id = $id;
        $this->setUsuario($usuario);
        $this->setOnde($onde);
        $this->data = $data;
        $this->nomePessoaAtendida = $nomePessoaAtendida;
        $this->contato = $contato;
        $this->relato = $relato;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        try {
            if(is_null($usuario->getId())){
                throw new NotPresentException("Usuário", '');
            }
        } catch (\Error $e) {
            throw new NotPresentException("Usuário", '');
        }
        $this->usuario = $usuario;
        return $this;
    }

    public function getOnde() {
        return $this->onde;
    }

    public function setOnde(LocalAtendimento $onde) {
        if(is_null($onde->getId())){
            throw new NotPresentException("local", $onde->id);
        }
        $this->onde = $onde;
        return $this;
    }
}
