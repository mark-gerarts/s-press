<?php

namespace Spress\Forms;

/**
 * Class SExpression
 *
 * @package Spress\Forms
 */
abstract class SExpression
{
    abstract public function toList(): array;

    abstract public function isList(): bool;
}
