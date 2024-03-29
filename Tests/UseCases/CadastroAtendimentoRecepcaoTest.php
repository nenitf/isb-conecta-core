<?php

namespace Core\Tests\UseCases;

use Core\Exceptions\Validations\ValidationException;

use Core\UseCases\CadastroAtendimentoRecepcao\{
    CadastroAtendimentoRecepcao,
    CadastroAtendimentoRecepcaoDTO,
};

use Core\Models\{
    Telefone,
};

use Core\Contracts\Repositories\{
    IAtendimentosRecepcaoRepository,
    IUsuariosRepository,
    ILocaisAtendimentoRepository,
};

class CadastroAtendimentoRecepcaoTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpDoubles();
    }

    private function setUpDoubles()
    {
        $this->doubleAtendimentosRecepcaoRepository = $this->createMock(
            IAtendimentosRecepcaoRepository::class
        );

        $this->doubleUsuariosRepository = $this->createMock(
            IUsuariosRepository::class
        );

        $this->doubleLocaisAtendimentoRepository = $this->createMock(
            ILocaisAtendimentoRepository::class
        );
    }

    protected function newSut(?array $methodsToMock = null) {
        return $this
            ->getMockBuilder(CadastroAtendimentoRecepcao::class)
            ->setConstructorArgs([
                $this->doubleAtendimentosRecepcaoRepository,
                $this->doubleUsuariosRepository,
                $this->doubleLocaisAtendimentoRepository,
            ])
            ->setMethods($methodsToMock)
            ->getMock();
    }

    protected function newDTO(){
        $dto = new CadastroAtendimentoRecepcaoDTO();
        return $dto;
    }

    /**
     * @dataProvider Core\Tests\UseCases\CadastroAtendimentoRecepcaoDataProviders\DeveFalharComException::earlyExceptions
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
}
