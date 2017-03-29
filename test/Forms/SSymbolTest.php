<?php

use Spress\Forms\SSymbol;

class SSymbolTest extends \PHPUnit\Framework\TestCase
{
    public function testToStringPrintsTheSymbol()
    {
        $symbol = new SSymbol('a-symbol');

        $this->assertEquals('a-symbol', $symbol->__toString());
    }
}
