<?php

namespace Spress\Forms;

use Spress\Exception\InConvertibleException;

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
        return (string) $this->value;
    }
}
