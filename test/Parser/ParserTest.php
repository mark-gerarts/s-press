<?php

namespace Spress\Parser;

use \Spress\Lexer\Lexer;
use \Spress\Forms\SNil;

class ParserTest extends \PHPUnit\Framework\TestCase
{
    public function testItHandlesALongList()
    {
        $parser = new Parser(new Lexer());

        $longTest = '(';
        $longTest .= implode(' ', range(1, 1000));
        $longTest .= ')';

        $parsedList = $parser->parse($longTest);

        $this->assertEquals($longTest, (string) $parsedList);
    }
}
