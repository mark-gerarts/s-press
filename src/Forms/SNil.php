<?php

namespace Spress\Forms;

/**
 * Class SNil
 *
 * @package Spress\Forms
 */
class SNil extends SExpression
{
    /**
     * @inheritdoc
     */
    public function toList(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function isList(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'nil';
    }
}
