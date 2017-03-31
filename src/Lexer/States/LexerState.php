<?php

namespace Spress\Lexer\States;

/**
 * Class LexerState
 *
 * @package Spress\Lexer\States
 */
abstract class LexerState
{
    /**
     * @param string $char
     * @return LexerState
     */
    abstract public function process(string $char): LexerState;

    /**
     * @return LexerState
     */
    abstract public function processEOF(): LexerState;
}