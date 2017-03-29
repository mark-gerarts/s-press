<?php

namespace Spress\Forms;

use Spress\Exception\InConvertibleException;

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
