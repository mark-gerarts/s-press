<?php

namespace Spress\Lexer\States;

use Spress\Exception\UnexpectedCharacterException;

/**
 * Class InSymbol
 *
 * @package Spress\Lexer\States
 */
class InSymbol extends LexerState
{
    /**
     * @var string
     */
    protected $symbol;

    /**
     * InSymbol constructor.
     *
     * @param string $symbol
     */
    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        if (ctype_space($char)) {

        }
    }

    /**
     * @inheritdoc
     */
    public function processEOF(): LexerState
    {
        throw new UnexpectedCharacterException('EOF');
    }

}
