<?php

namespace Core\Contracts\Repositories;

use Core\Models\Recepcal\LocalAtendimento;

interface ILocaisAtendimentoRepository
{
    public function findById(int $id): LocalAtendimento;
}
