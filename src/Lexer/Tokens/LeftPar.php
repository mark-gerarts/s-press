<?php

namespace Spress\Lexer\Tokens;

/**
 * Class LeftPar
 *
 * @package Spress\Lexer\Tokens
 */
final class LeftPar extends SExpToken
{
    /**
     * @return string
     */
    public function __toString()
    {
        return '(';
    }
}
