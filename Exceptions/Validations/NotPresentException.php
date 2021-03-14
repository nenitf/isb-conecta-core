<?php

namespace Core\Exceptions\Validations;

class NotPresentException extends ValidationException {
    public function __construct(string $campo) {
        parent::__construct($campo, "é um campo obrigatório");
    }
}

