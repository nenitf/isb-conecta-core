<?php

namespace Core\Tests\Unit;

use Core\Models\Telefone;
use Core\Models\Usuario\Usuario;
use Core\Models\Recepcao\LocalAtendimento;
use Core\Models\Recepcao\Atendimento;

use Core\Exceptions\Validations\ValidationException;

class AtendimentoTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider atendimentosInvalidos
     */
    public function testDeveFalharComErroAmigavel($mensagem, $params) {
        try {
            $t = new Atendimento(...$params);
            $this->fail('Deve cair no catch');
        } catch (ValidationException $e) {
            $this->assertEquals($mensagem, $e->mensagemAmigavel());
        }
    }

    public function atendimentosInvalidos()
    {
        yield 'usuário sem id' => [
            'Usuário é um campo obrigatório',
            [
                null, new Usuario(null, "a"), date_create(), new LocalAtendimento(1, "p"), "R", new Telefone('51', '12345678'), "b"
            ]
        ];
        yield 'local sem id' => [
            'Local é um campo obrigatório',
            [
                null, new Usuario(1, "a"), date_create(), new LocalAtendimento(null, "p"), "R", new Telefone('51', '12345678'), "b"
            ]
        ];
    }
}
