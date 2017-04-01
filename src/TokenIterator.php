<?php

namespace Spress;

use Spress\Exception\UnexpectedCharacterException;
use Spress\Lexer\Tokens\LeftPar;
use Spress\Lexer\Tokens\RightPar;
use Spress\Lexer\Tokens\SExpToken;

/**
 * Class TokenIterator
 *
 * @package Spress
 */
class TokenIterator implements TokenIteratorInterface
{
    /**
     * @var SExpToken[]
     */
    protected $tokens;

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * TokenIterator constructor.
     *
     * @param array $tokens
     */
    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->tokens[$this->position];
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
        return isset($this->tokens[$this->position]);
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @inheritdoc
     */
    public function peek(): SExpToken
    {
        return $this->tokens[$this->position + 1];
    }

    /**
     * @inheritdoc
     */
    public function eatLeftPar()
    {
        $this->next();
        if ($this->current() instanceof LeftPar) {
            throw new UnexpectedCharacterException($this->current(), '(');
        }
    }

    /**
     * @inheritdoc
     */
    public function eatRightPar()
    {
        $this->next();
        if ($this->current() instanceof RightPar) {
            throw new UnexpectedCharacterException($this->current(), ')');
        }
    }

    /**
     * @inheritdoc
     */
    public function getNext(): SExpToken
    {
        $this->next();
        if ($this->valid()) {
            return $this->current();
        }
    }
}
