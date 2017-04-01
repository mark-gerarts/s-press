<?php

namespace Spress\Serializer;

class SerializerTest extends \PHPUnit\Framework\TestCase
{
    public function testItSerializesAnEmptyArray()
    {
        $serializer = new Serializer();
        $sExpression = $serializer->serialize([]);

        $this->assertEquals('()', $sExpression);
    }
}
