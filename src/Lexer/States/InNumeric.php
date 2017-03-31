<?php

namespace Spress\Lexer\States;

/**
 * Class InNumeric
 *
 * @package Spress\Lexer\States
 */
class InNumeric extends LexerState
{
    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        if (is_numeric($char)) {
            return new InNumeric;
        }

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