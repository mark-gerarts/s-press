<?php

namespace Spress;

/**
 * Class StringIterator
 *
 * @package Spress
 */
class StringIterator implements \Iterator
{
    /**
     * @var string
     */
    protected $string;

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * StringIterator constructor.
     *
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->string[$this->position];
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return isset($this->string[$this->position]);
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->position = 0;
    }
}