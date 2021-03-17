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
        yield 'usuário faltando' => [
            'Usuário é um campo obrigatório',
            function(){
                $dto = $this->newDTO();
                $dto->data = date_create();
                $dto->idLocalAtendimento = 1;
                $dto->nomePessoaAtendida = "AAA";
                $dto->contato = "51987654321";
                $dto->relato = "aaa";
                return $dto;
            }
        ];
        yield 'Data faltando' => [
            'Data é um campo obrigatório',
            function(){
                $dto = $this->newDTO();
                $dto->idUsuario = 1;
                $dto->idLocalAtendimento = 1;
                $dto->nomePessoaAtendida = "AAA";
                $dto->contato = "51987654321";
                $dto->relato = "aaa";
                return $dto;
            }
        ];
        yield 'local faltando' => [
            'Local é um campo obrigatório',
            function(){
                $dto = $this->newDTO();
                $dto->idUsuario = 1;
                $dto->data = date_create();
                $dto->nomePessoaAtendida = "AAA";
                $dto->contato = "51987654321";
                $dto->relato = "aaa";
                return $dto;
            }
        ];
        yield 'pessoa atendida faltando' => [
            'Nome atendida é um campo obrigatório',
            function(){
                $dto = $this->newDTO();
                $dto->idUsuario = 1;
                $dto->data = date_create();
                $dto->idLocalAtendimento = 1;
                $dto->contato = "51987654321";
                $dto->relato = "aaa";
                return $dto;
            }
        ];
        yield 'contato faltando' => [
            'Contato é um campo obrigatório',
            function(){
                $dto = $this->newDTO();
                $dto->idUsuario = 1;
                $dto->data = date_create();
                $dto->idLocalAtendimento = 1;
                $dto->nomePessoaAtendida = "AAA";
                $dto->relato = "aaa";
                return $dto;
            }
        ];
        yield 'relato faltando' => [
            'Relato é um campo obrigatório',
            function(){
                $dto = $this->newDTO();
                $dto->idUsuario = 1;
                $dto->data = date_create();
                $dto->idLocalAtendimento = 1;
                $dto->nomePessoaAtendida = "AAA";
                $dto->contato = "51987654321";
                return $dto;
            }
        ];
    }

}
