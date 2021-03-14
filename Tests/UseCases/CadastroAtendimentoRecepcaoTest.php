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
    }

    protected function newSut(?array $methodsToMock = null) {
        return $this
            ->getMockBuilder(CadastroAtendimentoRecepcao::class)
            ->setConstructorArgs([
                $this->doubleAtendimentosRecepcaoRepository
            ])
            ->setMethods($methodsToMock)
            ->getMock();
    }

    protected function newDTO(){
        $dto = new CadastroAtendimentoRecepcaoDTO();
        return $dto;
    }

    /**
     * @dataProvider Core\Tests\UseCases\CadastroAtendimentoRecepcaoDataProviders\DeveFalharComException::earlyExceptions()
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

    //public function testDevePersistir() {
    //    $sut = $this->newSut();

    //    $atendimento = new AtendimentoRecepcao();

    //    $atendimento->id = 1;
    //    $atendimento->data = \DateTime::createFromFormat('Y-m-d', '2021-01-25');
    //    $atendimento->onde = 1;
    //    $atendimento->nomePessoa = 'Eduardo Silva';
    //    $atendimento->contato = '5199999999';
    //    $atendimento->relato = 'etc etc etc';

    //    $dto = $this->newDTO();

    //    $dto->usuario               = $atendimento->data;
    //    $dto->data                  = $atendimento->onde;
    //    $dto->onde                  = $atendimento->nomePessoa;
    //    $dto->nomePessoaAtendida    = $atendimento->contato;
    //    $dto->contato               = $atendimento->contato;
    //    $dto->relato                = $atendimento->relato;

    //    $this
    //        ->doubleAtendimentosRecepcaoRepository
    //        ->expects($this->once())
    //        ->method('save')
    //        ->willReturn($atendimento);

    //    $sut->execute($dto);
    //}
}
