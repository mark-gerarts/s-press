<?php

namespace Spress\Lexer\Tokens;

/**
 * Class LEFT_PAR
 *
 * @package Spress\Lexer\Tokens
 */
final class LEFT_PAR extends SExpToken
{
    /**
     * @return string
     */
    public function __toString()
    {
        return '(';
    }
}
