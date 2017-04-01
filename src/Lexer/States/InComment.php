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
        // A comment lasts until the next newline.
        return $char == "\n"
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
