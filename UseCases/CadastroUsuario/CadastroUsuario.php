<?php

namespace Core\UseCases\CadastroUsuario;

use Core\Models\{
    Usuario\Usuario,
    Email,
};

use Core\Contracts\Repositories\{
    IUsuariosRepository,
    ISetoresRepository,
};

use Core\Contracts\Providers\{
    ICriptografiaProvider,
};

class CadastroUsuario
{
    public function __construct(
        IUsuariosRepository $usuariosRepository,
        ISetoresRepository $setoresRepository,
        ICriptografiaProvider $criptografiaProvider
    ){
        $this->usuariosRepository = $usuariosRepository;
        $this->criptografiaProvider = $criptografiaProvider;
        $this->setoresRepository = $setoresRepository;
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

        $email = new Email($dto->email);

        $setor = $this->setoresRepository->findById($dto->idSetor);

        $usuario->email = $email;
        $usuario->setor = $setor;

        $this
            ->usuariosRepository
            ->save($usuario);
    }
}
