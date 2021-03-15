<?php

namespace Core\Tests\UseCases\CadastroAtendimentoRecepcaoDataProviders;

use Core\Models\{
    Telefone,
    Usuario\Usuario,
    Recepcao\LocalAtendimento,
    Recepcao\Atendimento,
};

class DeveFalharComException extends \Core\Tests\UseCases\CadastroAtendimentoRecepcaoTest{
    public function earlyExceptions()
    {
        yield 'atendimento faltando' => [
            'Atendimento é um campo obrigatório',
            function(){
                $dto = $this->newDTO();
                return $dto;
            }
        ];
    }

}
