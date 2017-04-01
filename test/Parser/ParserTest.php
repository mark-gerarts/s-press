<?php

namespace Spress\Parser;

use \Spress\Lexer\Lexer;
use \Spress\Forms\SNil;

class ParserTest extends \PHPUnit\Framework\TestCase
{
    public function testItParsesAnEmptyList()
    {
        $parser = new Parser(new Lexer());
        $parsedList = $parser->parse('()');

        $this->assertEquals(new SNil(), $parsedList);
    }
}
