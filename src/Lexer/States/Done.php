<?php

namespace Spress\Lexer\States;

use Spress\Exception\ImpossibleException;

/**
 * Class Done
 *
 * @package Spress\Lexer\States
 */
class Done extends LexerState
{
    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        throw new ImpossibleException();
    }

    /**
     * @inheritdoc
     */
    public function processEOF(): LexerState
    {
        return $this;
    }
}