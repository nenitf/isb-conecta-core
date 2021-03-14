<?php

namespace Core\UseCases\CadastroAtendimentoRecepcao;

use Core\Exceptions\Validations\ValidationException;

use Core\Models\{
    Usuario\Usuario,
    Telefone,
};

class CadastroAtendimentoRecepcaoDTO
{
    public Usuario $usuario;
    public \DateTime $data;
    public int $onde;
    public string $nomePessoaAtendida;
    public Telefone $contato;
    public string $relato;

    public function valida()
    {
        throw new ValidationException('Data', 'é um campo obrigatório', '');
    }
}
