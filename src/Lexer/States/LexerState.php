<?php

namespace Spress\Lexer\States;

use Spress\Lexer\Tokens\SExpToken;

/**
 * Class LexerState
 *
 * @package Spress\Lexer\States
 */
abstract class LexerState
{
    /**
     * @var SExpToken
     */
    protected $token;

    /**
     * Processes a single character and returns a matching state.
     *
     * @param string $char
     * @return LexerState
     */
    abstract public function process(string $char): LexerState;

    /**
     * Processes end of file.
     *
     * @return LexerState
     */
    abstract public function processEOF(): LexerState;

    /**
     * @return SExpToken
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Called when exiting a state. Sets the retrieved token value.
     *
     * @param SExpToken $token
     */
    protected function emit(SExpToken $token)
    {
        $this->token = $token;
    }
}
