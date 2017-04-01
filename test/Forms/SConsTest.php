<?php

namespace Spress\Forms;

class SConsTest extends \PHPUnit\Framework\TestCase
{
    public function testToStringPrintsAsExpected()
    {
        foreach ($this->getToStringTestCases() as $description => $setup) {
            list($input, $expected) = $setup;
            $actual = (string) $input;
            $this->assertEquals($expected, $actual, $description);
        }
    }

    protected function getToStringTestCases()
    {
        return [
            'It should print a single value' => [
                new SCons(new SInteger(123), new SNil()),
                '(123)'
            ],
            'It should print multiple values' => [
                new SCons(new SInteger(123),
                    new SCons(new SSymbol('symbol'), new SNil())
                ),
                '(123 symbol)'
            ],
            'It should print nested lists' => [
                new Scons(new SInteger(123), new SCons(
                    new Scons(new SSymbol('symbol'), new SNil()),
                    new SNil()
                )),
                '(123 (symbol))'
            ],
            'It should handle nils' => [
                new SCons(new SNil(), new SNil()),
                '(())'
            ]
        ];
    }

    public function testToListWorksAsExpected()
    {
        foreach ($this->getToListTestCases() as $description => $setup) {
            list($input, $expected) = $setup;
            $actual = $input->toList();
            $this->assertEquals($expected, $actual, $description);
        }
    }

    protected function getToListTestCases()
    {
        return [
            'It should treat a single value as such' => [
                new SCons(new SInteger(123), new SNil()),
                [new SInteger(123)]
            ],
            'It should combine multiple values in a list' => [
                new SCons(new SInteger(123), new SCons(
                    new SSymbol('symbol'), new SNil()
                ), new SNil()),
                [new SInteger(123), new SSymbol('symbol')]
            ],
            'It should handle nested lists' => [
                new SCons(new SInteger(123), new SCons(
                    new SCons(new SInteger(321), new SNil()),
                    new SNil()
                )),
                [new SInteger(123), new SCons(new SInteger(321), new SNil())]
            ]
        ];
    }
}
