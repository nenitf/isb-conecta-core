<?php

namespace Core\UseCases\CadastroAtendimentoRecepcao;

use Core\Contracts\Repositories\{
    IAtendimentosRecepcaoRepository,
};

class CadastroAtendimentoRecepcao
{
    public function __construct(
        IAtendimentosRecepcaoRepository $atendimentosRecepcaoRepository
    ){
        $this->atendimentosRecepcaoRepository = $atendimentosRecepcaoRepository;
    }

    public function execute(CadastroAtendimentoRecepcaoDTO $dto): void
    {
        $dto->valida();

        $this
            ->atendimentosRecepcaoRepository
            ->save($dto->atendimento);
    }
}
