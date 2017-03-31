<?php

namespace Spress\Lexer\States;

/**
 * Class InComment
 *
 * @package Spress\Lexer\States
 */
class InComment extends LexerState
{
    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        return $char == '\n'
            ? new InWhitespace
            : new InComment;
    }

    /**
     * @inheritdoc
     */
    public function processEOF(): LexerState
    {
        return new Done;
    }
}