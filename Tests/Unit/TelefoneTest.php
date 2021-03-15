<?php

namespace Core\Tests\Unit;

use Core\Models\Telefone;

use Core\Exceptions\Validations\ValidationException;

class TelefoneTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider telefonesInvalidos
     */
    public function testDeveFalharComErroAmigavel($mensagem, $ddd, $numero) {
        try {
            $t = new Telefone($ddd, $numero);
            $this->fail('Deve cair no catch');
        } catch (ValidationException $e) {
            $this->assertEquals($mensagem, $e->mensagemAmigavel());
        }
    }

    public function telefonesInvalidos()
    {
        yield 'ddd vazio' => [
            'Ddd deve possuir 2 dígitos',
            '', '987875454'
        ];
        yield 'ddd 1 dígito' => [
            'Ddd deve possuir 2 dígitos',
            '1', '987875454'
        ];
        yield 'ddd 3 dígito' => [
            'Ddd deve possuir 2 dígitos',
            '512', '987875454'
        ];
        yield 'número 5 dígitos' => [
            'Telefone deve possuir entre 8 e 9 dígitos',
            '51', '98787'
        ];
        yield 'número 6 dígitos' => [
            'Telefone deve possuir entre 8 e 9 dígitos',
            '51', '987878'
        ];
        yield 'número 7 dígitos' => [
            'Telefone deve possuir entre 8 e 9 dígitos',
            '51', '9878789'
        ];
        yield 'número 10 dígitos' => [
            'Telefone deve possuir entre 8 e 9 dígitos',
            '51', '9878789999'
        ];
        yield 'número 11 dígitos' => [
            'Telefone deve possuir entre 8 e 9 dígitos',
            '51', '98787899991'
        ];
        yield 'número 12 dígitos' => [
            'Telefone deve possuir entre 8 e 9 dígitos',
            '51', '987878999912'
        ];
    }
}
