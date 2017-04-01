<?php

namespace Spress\Lexer\Tokens;

/**
 * Class Id
 *
 * @package Spress\Lexer\Tokens
 */
final class Id extends SExpToken
{
    /**
     * @var string
     */
    public $value = '';

    /**
     * Id constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
