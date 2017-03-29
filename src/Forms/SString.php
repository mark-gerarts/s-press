<?php

namespace Spress\Forms;

/**
 * Class SString
 *
 * @package Spress\Forms
 */
class SString extends SExpression
{
    /**
     * @var int
     */
    protected $value;

    /**
     * SString constructor.
     *
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->value = $string;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
