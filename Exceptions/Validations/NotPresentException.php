<?php

namespace Core\Exceptions\Validations;

class NotPresentException extends ValidationException {
    public function __construct(string $campo, $valor) {
        parent::__construct($campo, "é um campo obrigatório", $valor);
    }
}

