<?php

namespace Spress\Serializer;

use Spress\Lexer\Lexer;
use Spress\Parser\Parser;

class SerializerTest extends \PHPUnit\Framework\TestCase
{
    public function testItSerializesAnEmptyArray()
    {
        $serializer = new Serializer(new Parser(new Lexer()));
        $sExpression = $serializer->serialize([]);

        $this->assertEquals('()', $sExpression);
    }
}
