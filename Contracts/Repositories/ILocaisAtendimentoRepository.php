<?php

namespace Core\Contracts\Repositories;

use Core\Models\Recepcao\LocalAtendimento;

interface ILocaisAtendimentoRepository
{
    public function findById(int $id): ?LocalAtendimento;
}
