<?php

namespace Spress\Forms;

/**
 * Class SCons
 *
 * @package Spress\Forms
 */
class SCons extends SExpression
{
    /**
     * @var SExpression
     */
    protected $car;

    /**
     * @var SExpression
     */
    protected $cdr;

    /**
     * SCons constructor.
     *
     * @param SExpression $car
     * @param SExpression $cdr
     */
    public function __construct(SExpression $car, SExpression $cdr)
    {
        $this->car = $car;
        $this->cdr = $cdr;
    }

    /**
     * @inheritdoc
     */
    public function toList(): array
    {
        return array_unshift($this->cdr->toList(), $this->car);
    }

    /**
     * @inheritdoc
     */
    public function isList(): bool
    {
        return $this->cdr->isList();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {

    }
}
