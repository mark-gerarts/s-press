<?php

use Spress\Forms\SInteger;

class SIntegerTest extends \PHPUnit\Framework\TestCase
{
    public function testToStringPrintsTheInteger()
    {
        $int = new SInteger(123);

        $this->assertEquals(123, $int->__toString());
    }
}
