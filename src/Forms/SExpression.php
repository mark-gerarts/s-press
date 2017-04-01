<?php

namespace Spress\Forms;

/**
 * Class SExpression
 *
 * @package Spress\Forms
 */
abstract class SExpression
{
    /**
     * @return array
     */
    abstract public function toList(): array;

    /**
     * @return bool
     */
    abstract public function isList(): bool;
}
