<?php

use \Spress\Lexer\Lexer;
use \Spress\Lexer\Tokens\LEFT_PAR;
use \Spress\Lexer\Tokens\RIGHT_PAR;
use \Spress\Lexer\Tokens\INTEGER;

class LexerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Lexer
     */
    private $lexer;

    public function setUp()
    {
        $this->lexer = new Lexer();
    }

    public function testItLexesCorrectly()
    {
        foreach ($this->getTestCases() as $description => $testCase) {
            list($input, $expectedOutput) = $testCase;
            $actualOutput = $this->lexer->lex($input);
            $this->assertEquals($expectedOutput, $actualOutput, $description);
        }
    }

    protected function getTestCases()
    {
        return [
            'It should lex an empty list' => [
                '()', [
                    new LEFT_PAR,
                    new RIGHT_PAR
                ]
            ],
            'It should parse an integer' => [
                '(123)', [
                    new LEFT_PAR,
                    new INTEGER(123),
                    new RIGHT_PAR
                ]
            ],
            'It should ignore whitespace' => [
                " (   123 \n\t\r\0\x0B  )   ", [
                    new LEFT_PAR,
                    new INTEGER(123),
                    new RIGHT_PAR
                ]
            ],
            'It should ignore comments' => [
                "( ; This is a comment!;)))\n )", [
                    new LEFT_PAR,
                    new RIGHT_PAR
                ]
            ]
        ];
    }
}
