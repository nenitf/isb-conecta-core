<?php

namespace Core\Tests\UseCases\CadastroAtendimentoRecepcaoDataProviders;

use Core\Models\{
    Telefone,
    Usuario\Usuario,
};

class DeveFalharComException extends \Core\Tests\UseCases\CadastroAtendimentoRecepcaoTest{
    public function earlyExceptions()
    {
        yield 'data faltando' => [
            'Data é um campo obrigatório',
            function(){
                $usuario = new Usuario();

                $dto = $this->newDTO();
                $dto->usuario               = $usuario;
                $dto->onde                  = 1;
                $dto->nomePessoaAtendida    = "Eduardo";
                $dto->contato               = new Telefone('51', '999999999');
                $dto->relato                = "aaaaaaa";
                return $dto;
            }
        ];
    }

}
