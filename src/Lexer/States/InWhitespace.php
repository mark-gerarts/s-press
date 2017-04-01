<?php

namespace Spress\Lexer\States;

use Spress\Lexer\Tokens\LEFT_PAR;
use Spress\Lexer\Tokens\RIGHT_PAR;

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
            return new InNumeric($char);
        }

        switch ($char) {
            case ';':
            case '(':
                $this->emit(new LEFT_PAR);
                return new InWhitespace;
            case ')':
                $this->emit(new RIGHT_PAR);
                return new InWhitespace;
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
