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
     * @param string $char
     * @return LexerState
     */
    abstract public function process(string $char): LexerState;

    /**
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
     * @param SExpToken $token
     */
    protected function emit(SExpToken $token)
    {
        $this->token = $token;
    }

    /**
     * @return LexerState
     */
    public static function inWhitespace(): LexerState
    {
        return new InWhitespace();
    }
}
