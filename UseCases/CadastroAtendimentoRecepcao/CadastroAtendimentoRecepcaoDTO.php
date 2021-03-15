<?php

namespace Core\UseCases\CadastroAtendimentoRecepcao;

use Core\Exceptions\Validations\ValidationException;

use Core\Models\Usuario\Usuario;
use Core\Models\Recepcao\Atendimento;

class CadastroAtendimentoRecepcaoDTO
{
    public Atendimento $atendimento;

    public function valida()
    {
        throw new ValidationException('Atendimento', 'é um campo obrigatório', '');
    }
}
