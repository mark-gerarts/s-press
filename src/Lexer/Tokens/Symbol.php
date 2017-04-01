<?php

namespace Spress\Lexer\Tokens;

/**
 * Class Symbol
 *
 * @package Spress\Lexer\Tokens
 */
final class Symbol extends SExpToken
{
    /**
     * @var string
     */
    public $value = '';

    /**
     * Symbol constructor.
     *
     * @param string $symbol
     */
    public function __construct(string $symbol)
    {
        $this->value = $symbol;
    }
}
