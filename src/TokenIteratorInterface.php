<?php

namespace Spress;

use Spress\Exception\UnexpectedCharacterException;
use Spress\Lexer\Tokens\SExpToken;

interface TokenIteratorInterface extends \Iterator
{
    /**
     * Takes a look at the next token without advancing the iterator.
     *
     * @return SExpToken
     */
    public function peek(): SExpToken;

    /**
     * @throws UnexpectedCharacterException
     */
    public function eatLeftPar();

    /**
     * @throws UnexpectedCharacterException
     */
    public function eatRightPar();

    /**
     * @return SExpToken
     */
    public function getNext(): SExpToken;
}
