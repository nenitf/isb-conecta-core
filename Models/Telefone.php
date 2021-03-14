<?php

namespace Core\Models;

use Core\Exceptions\ValidationException;

class Telefone
{
    private string $ddd;
    private string $numero;

    public function __construct($ddd, $numero)
    {
        $this->setDdd($ddd);
        $this->setNumero($numero);
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero(string $numero) {
        if(strlen($numero) != 8 && strlen($numero) != 9) {
            throw ValidationException("telefone", "deve possuir entre 8 e 9 dígitos");
        }
        $this->numero = $numero;
        return $this;
    }

    public function getDdd() {
        return $this->ddd;
    }

    public function setDdd(string $ddd) {
        if(strlen($ddd) != 2) {
            throw ValidationException("ddd", "deve possuir 2 dígitos");
        }
        $this->ddd = $ddd;
        return $this;
    }

    public function formatado()
    {
        return "({$this->ddd}) {$this->numero}";
    }
}
