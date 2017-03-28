<?php

use \Spress\Parser\Parser;

class ParserTest extends \PHPUnit\Framework\TestCase
{
    public function testItParsesAnEmptyList()
    {
        $parser = new Parser;
        $parsedList = $parser->parse('()');

        $this->assertEquals([], $parsedList);
    }
}
