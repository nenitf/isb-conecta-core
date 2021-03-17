<?php

namespace Core\UseCases\CadastroUsuario;

use Core\Contracts\Repositories\{
    IUsuariosRepository,
};

use Core\Contracts\Providers\{
    ICriptografiaProvider,
};

class CadastroUsuario
{
    public function __construct(
        IUsuariosRepository $usuariosRepository,
        ICriptografiaProvider $criptografiaProvider
    ){
        $this->usuariosRepository = $usuariosRepository;
        $this->criptografiaProvider = $criptografiaProvider;
    }

    public function execute(CadastroUsuarioDTO $dto): void
    {
        $dto->valida();

        $senhaCifrada = $this
            ->criptografiaProvider
            ->cifrar($dto->senha);

        $usuario = new Usuario(
            null, $dto->nome, $senhaCifrada
        );

        $this
            ->usuariosRepository
            ->save($usuario);
    }
}
