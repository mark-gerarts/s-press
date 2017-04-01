<?php

namespace Spress\Lexer\Tokens;

/**
 * Class RIGHT_PAR
 *
 * @package Spress\Lexer\Tokens
 */
final class RIGHT_PAR extends SExpToken
{
    /**
     * @return string
     */
    public function __toString()
    {
        return ')';
    }
}
