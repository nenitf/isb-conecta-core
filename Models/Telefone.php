<?php

namespace Core\Models;

use Core\Exceptions\Validations\ValidationException;

class Telefone
{
    private string $ddd;
    private string $numero;

    public static function comNumeroCompleto(string $numeroCompleto): Telefone
    {
        $ddd = substr($numeroCompleto, 0, 2);
        $numero = substr($numeroCompleto, 2, -1);
        return new Telefone($ddd, $numero);
    }

    public function __construct($ddd, $numero)
    {
        $this->setDdd($ddd);
        $this->setNumero($numero);
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero(string $numero) {
        if (preg_match('/^\d{8,9}$/', $numero) !== 1) {
            throw new ValidationException("telefone", "deve possuir entre 8 e 9 dígitos", $numero);
        }
        $this->numero = $numero;
        return $this;
    }

    public function getDdd() {
        return $this->ddd;
    }

    public function setDdd(string $ddd) {
        if (preg_match('/^\d{2}$/', $ddd) !== 1) {
            throw new ValidationException("ddd", "deve possuir 2 dígitos", $ddd);
        }
        $this->ddd = $ddd;
        return $this;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->numero}";
    }
}
