<?php

namespace Spress\Forms;

/**
 * Class SSymbol
 *
 * @package Spress\Forms
 */
class SSymbol extends SExpression
{
    /**
     * @var int
     */
    protected $value;

    /**
     * SSymbol constructor.
     *
     * @param string $symbol
     */
    public function __construct(string $symbol)
    {
        $this->value = $symbol;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
