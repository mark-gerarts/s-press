<?php

namespace Spress\Lexer\States;

/**
 * Class InWhitespace
 *
 * @package Spress\Lexer\States
 */
class InWhitespace extends LexerState
{
    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        if (ctype_space($char)) {
            return new InWhitespace;
        }
        if (is_numeric($char)) {
            // @todo: numeric
        }

        switch ($char) {
            case ';':
            case '(':
            case ')':
            default:
                return new InWhitespace;
        }
    }

    /**
     * @inheritdoc
     */
    public function processEOF(): LexerState
    {
        return new Done;
    }
}