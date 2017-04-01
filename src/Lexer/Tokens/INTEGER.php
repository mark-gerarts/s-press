<?php

namespace Spress\Lexer\Tokens;

/**
 * Class INTEGER
 *
 * @package Spress\Lexer\Tokens
 */
final class INTEGER extends SExpToken
{
    /**
     * @var int
     */
    public $value;

    /**
     * INTEGER constructor.
     *
     * @param int $integer
     */
    public function __construct(int $integer)
    {
        $this->value = $integer;
    }
}
