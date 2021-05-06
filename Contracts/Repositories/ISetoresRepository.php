<?php

namespace Core\Contracts\Repositories;

use Core\Models\Setor;

interface ISetoresRepository
{
    public function findById(int $id): ?Setor;
}
