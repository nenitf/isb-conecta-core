<?php

namespace Core\Contracts\Repositories;

use Core\Models\Usuario\Usuario;

interface IUsuariosRepository
{
    public function findById(int $id): ?Usuario;
    public function save(Usuario $u): ?Usuario;
}
