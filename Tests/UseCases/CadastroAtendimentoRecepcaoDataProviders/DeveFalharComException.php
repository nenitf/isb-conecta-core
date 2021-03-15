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

                $a = new Atendimento(
                    null,
                    new Usuario(1, "Ricardo"),
                    date_create_from_format('j-m-Y', '15-02-2019'),
                    new LocalAtendimento(1, "Porta"),
                    'Rodrigo',
                    new Telefone('51', 999985467),
                    'blabla'
                );

                $dto = $this->newDTO();
                $dto->atendimento = $a;
                return $dto;
            }
        ];
    }

}
