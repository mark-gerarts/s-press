<?php

use \Spress\Lexer\Lexer;

class LexerTest extends \PHPUnit\Framework\TestCase
{
    public function testItLexesAnEmptyList()
    {
        $lexer = new Lexer();
        $parsedList = $lexer->lex('()');

        $this->assertEquals([], $parsedList);
    }
}
