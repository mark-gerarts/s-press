<?php

namespace Spress\Forms;

/**
 * Class SInteger
 *
 * @package Spress\Forms
 */
class SInteger extends SExpression
{
    /**
     * @var int
     */
    protected $value;

    /**
     * SInteger constructor.
     *
     * @param int $integer
     */
    public function __construct(int $integer)
    {
        $this->value = $integer;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->value;
    }
}
