<?php

namespace Spress\Lexer\States;

use Spress\Lexer\Tokens\LeftPar;
use Spress\Lexer\Tokens\RightPar;

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
                return new InComment;
            case '(':
                $this->emit(new LeftPar);
                return new InWhitespace;
            case ')':
                $this->emit(new RightPar);
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
