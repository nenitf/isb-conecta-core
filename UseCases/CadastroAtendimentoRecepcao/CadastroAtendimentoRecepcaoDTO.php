<?php

namespace Core\UseCases\CadastroAtendimentoRecepcao;

use Core\Exceptions\Validations\{
    ValidationException,
    NotPresentException,
};

class CadastroAtendimentoRecepcaoDTO
{
    public int $idUsuario;
    public \DateTime $data;
    public int $idLocalAtendimento;
    public string $nomePessoaAtendida;
    public string $contato;
    public string $relato;

    public function valida()
    {
        try{
            $a = $this->idUsuario;
        } catch (\Error $e){
            throw new NotPresentException('Usuário');
        }

        try{
            $a = $this->data;
        } catch (\Error $e){
            throw new NotPresentException('Data');
        }

        try{
            $a = $this->idLocalAtendimento;
        } catch (\Error $e){
            throw new NotPresentException('Local');
        }

        try{
            $a = $this->nomePessoaAtendida;
        } catch (\Error $e){
            throw new NotPresentException('Nome atendida');
        }

        try{
            $a = $this->contato;
        } catch (\Error $e){
            throw new NotPresentException('Contato');
        }

        try{
            $a = $this->relato;
        } catch (\Error $e){
            throw new NotPresentException('Relato');
        }
    }
}
