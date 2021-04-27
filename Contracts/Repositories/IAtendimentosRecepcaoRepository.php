<?php

namespace Core\Contracts\Repositories;

use Core\Models\Recepcao\Atendimento;

interface IAtendimentosRecepcaoRepository
{
    public function save(Atendimento $a): ?Atendimento;
}
