<?php

use \Spress\Lexer\Lexer;
use \Spress\Lexer\Tokens\LeftPar;
use \Spress\Lexer\Tokens\RightPar;
use \Spress\Lexer\Tokens\Integer;
use \Spress\Lexer\Tokens\Symbol;

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
                "()", [
                    new LeftPar,
                    new RightPar
                ]
            ],
            'It should parse an integer' => [
                "(123)", [
                    new LeftPar,
                    new Integer(123),
                    new RightPar
                ]
            ],
            'It should ignore whitespace' => [
                " (   123 \n\t\r\0\x0B  )   ", [
                    new LeftPar,
                    new Integer(123),
                    new RightPar
                ]
            ],
            'It should ignore comments' => [
                "( ; This is a comment!;)))\n )", [
                    new LeftPar,
                    new RightPar
                ]
            ],
            'It should parse symbols' => [
                "(symbol another-symbol)", [
                    new LeftPar,
                    new Symbol('symbol'),
                    new Symbol('another-symbol'),
                    new RightPar
                ]
            ]
        ];
    }
}
