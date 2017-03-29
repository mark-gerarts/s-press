<?php

namespace Spress\Forms;

use Spress\Exception\InConvertibleException;

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
     * @inheritdoc
     */
    public function toList(): array
    {
        throw new InConvertibleException();
    }

    /**
     * @inheritdoc
     */
    public function isList(): bool
    {
        return false;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
