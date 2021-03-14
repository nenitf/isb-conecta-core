<?php

namespace Core\Contracts\Repositories;

use Core\Models\{
    AtendimentoRecepcao,
};

interface IAtendimentosRecepcaoRepository
{
    public function save(AtendimentoRecepcao $a): AtendimentoRecepcao;
}
