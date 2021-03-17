<?php

namespace Core\UseCases\CadastroUsuario;

use Core\Exceptions\Validations\{
    ValidationException,
    NotPresentException,
};

class CadastroUsuarioDTO
{
    public string $nome;
    public string $senha;

    public function valida()
    {
        try{
            $a = $this->nome;
        } catch (\Error $e){
            throw new NotPresentException('Nome', '');
        }

        try{
            $a = $this->senha;
        } catch (\Error $e){
            throw new NotPresentException('Senha', '');
        }

        if(strlen($this->senha) < 6){
            throw new ValidationException(
                'Senha', 'deve possuir no mínimo 6 caracteres', $this->senha
            );
        }
    }
}
