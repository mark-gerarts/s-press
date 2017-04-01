<?php

namespace Spress\Lexer\Tokens;

/**
 * Class RightPar
 *
 * @package Spress\Lexer\Tokens
 */
final class RightPar extends SExpToken
{
    /**
     * @return string
     */
    public function __toString()
    {
        return ')';
    }
}
