<?php

namespace Core\UseCases\CadastroAtendimentoRecepcao;

use Core\Exceptions\Validations\{
    ValidationException,
    NotPresentException,
};

use Core\Models\Usuario\Usuario;
use Core\Models\Recepcao\Atendimento;

class CadastroAtendimentoRecepcaoDTO
{
    public Atendimento $atendimento;

    public function valida()
    {
        throw new NotPresentException('Atendimento', '');
    }
}
