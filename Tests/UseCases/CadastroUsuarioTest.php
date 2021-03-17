<?php

namespace Core\Tests\UseCases;

use Core\Exceptions\Validations\ValidationException;

use Core\UseCases\CadastroUsuario\{
    CadastroUsuario,
    CadastroUsuarioDTO,
};

use Core\Contracts\Repositories\{
    IUsuariosRepository,
};

use Core\Contracts\Providers\{
    ICriptografiaProvider,
};

class CadastroUsuarioTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpDoubles();
    }

    private function setUpDoubles()
    {
        $this->doubleUsuariosRepository = $this->createMock(
            IUsuariosRepository::class
        );

        $this->doubleCriptografiaProvider = $this->createMock(
            ICriptografiaProvider::class
        );
    }

    protected function newSut(?array $methodsToMock = null) {
        return $this
            ->getMockBuilder(Cadastrousuario::class)
            ->setConstructorArgs([
                $this->doubleUsuariosRepository,
                $this->doubleCriptografiaProvider,
            ])
            ->setMethods($methodsToMock)
            ->getMock();
    }

    /**
     * @dataProvider dtosInvalidos
     */
    public function testDeveFalharComErroAmigavel($mensagem, $dto) {
        $sut = $this->newSut();

        try {
            $sut->execute($dto());
            $this->fail('Deve cair no catch');
        } catch (ValidationException $e) {
            $this->assertEquals($mensagem, $e->mensagemAmigavel());
        }
    }

    public function dtosInvalidos()
    {
        yield 'nome vazio' => [
            'Nome é um campo obrigatório',
            function(){
                $dto = new CadastroUsuarioDTO();
                $dto->senha = "123456789";
                return $dto;
            }
        ];
        yield 'senha vazio' => [
            'Senha é um campo obrigatório',
            function(){
                $dto = new CadastroUsuarioDTO();
                $dto->nome = "AAAA";
                return $dto;
            }
        ];
        yield 'senha inválida' => [
            'Senha deve possuir no mínimo 6 caracteres',
            function(){
                $dto = new CadastroUsuarioDTO();
                $dto->nome = "AAAA";
                $dto->senha = "123";
                return $dto;
            }
        ];
    }
}

