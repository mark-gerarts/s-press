<?php

use Spress\Forms\SString;

class SStringTest extends \PHPUnit\Framework\TestCase
{
    public function testToStringPrintsAString()
    {
        $string = new SString('a-string');

        $this->assertEquals('"a-string"', $string->__toString());
    }
}
