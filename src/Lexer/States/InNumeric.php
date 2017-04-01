<?php

namespace Spress\Lexer\States;

use Spress\Lexer\Tokens\INTEGER;

/**
 * Class InNumeric
 *
 * @package Spress\Lexer\States
 */
class InNumeric extends LexerState
{
    /**
     * @var string
     */
    protected $buffer = '';

    /**
     * InNumeric constructor.
     *
     * @param $number
     */
    public function __construct($number)
    {
        $this->buffer = $number;
    }

    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        if (is_numeric($char)) {
            $this->buffer .= $char;
            return $this;
        }

        $this->emit(new INTEGER((int) $this->buffer));

        return new InWhitespace;
    }

    /**
     * @inheritdoc
     */
    public function processEOF(): LexerState
    {
        return new Done;
    }
}
