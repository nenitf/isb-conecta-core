<?php

namespace Core\Exceptions\Validations;

use Core\Exceptions\CoreException;

class ValidationException extends CoreException {
    public function __construct(string $campo, string $erro, $valorErrado) {
        $this->campo = $campo;
        $this->erro = $erro;
        $this->mensagem = ucfirst($campo) . " {$erro}";

        parent::__construct($this->mensagem);
    }

    public function mensagemAmigavel(): string
    {
        return $this->mensagem;
    }

    public function mensagemLog(): string
    {
        return "$this->mensagem ('$valorErrado' foi utilizado)";
    }
}

