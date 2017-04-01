<?php

namespace Spress\Lexer\Tokens;

/**
 * Class Integer
 *
 * @package Spress\Lexer\Tokens
 */
final class Integer extends SExpToken
{
    /**
     * @var int
     */
    public $value;

    /**
     * Integer constructor.
     *
     * @param int $integer
     */
    public function __construct(int $integer)
    {
        $this->value = $integer;
    }
}
