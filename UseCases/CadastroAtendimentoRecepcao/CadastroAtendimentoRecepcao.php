<?php

namespace Core\UseCases\CadastroAtendimentoRecepcao;

use Core\Models\Telefone;

use Core\Models\Recepcao\Atendimento;

use Core\Contracts\Repositories\{
    IAtendimentosRecepcaoRepository,
    IUsuariosRepository,
    ILocaisAtendimentoRepository,
};

class CadastroAtendimentoRecepcao
{
    public function __construct(
        IAtendimentosRecepcaoRepository $atendimentosRecepcaoRepository,
        IUsuariosRepository $usuariosRepository,
        ILocaisAtendimentoRepository $locaisRepository
    ){
        $this->atendimentosRecepcaoRepository = $atendimentosRecepcaoRepository;
        $this->usuariosRepository = $usuariosRepository;
        $this->locaisRepository = $locaisRepository;
    }

    public function execute(CadastroAtendimentoRecepcaoDTO $dto): void
    {
        $dto->valida();

        $usuario = $this
            ->usuariosRepository
            ->findById($dto->idUsuario);

        $onde = $this
            ->locaisRepository
            ->findById($dto->idLocalAtendimento);

        $atendimento = new Atendimento(
            null,
            $usuario,
            $dto->data,
            $onde,
            $dto->nomePessoaAtendida,
            Telefone::comNumeroCompleto($dto->contato),
            $dto->relato
        );

        $this
            ->atendimentosRecepcaoRepository
            ->save($dto->atendimento);
    }
}
