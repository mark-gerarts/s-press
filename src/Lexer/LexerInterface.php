<?php

namespace Spress\Lexer;

/**
 * Interface LexerInterface
 *
 * @package Spress\Lexer
 */
interface LexerInterface
{
    /**
     * @param string $input
     * @return array
     */
    public function lex(string $input): array;
}
