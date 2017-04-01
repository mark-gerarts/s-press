<?php

namespace Spress\Parser;

use Spress\Exception\UnexpectedCharacterException;
use Spress\Forms\SCons;
use Spress\Forms\SExpression;
use Spress\Forms\SInteger;
use Spress\Forms\SNil;
use Spress\Forms\SSymbol;
use Spress\Lexer\LexerInterface;
use Spress\Lexer\Tokens\EndOfInput;
use Spress\Lexer\Tokens\Id;
use Spress\Lexer\Tokens\Integer;
use Spress\Lexer\Tokens\LeftPar;
use Spress\Lexer\Tokens\RightPar;
use Spress\TokenIterator;
use Spress\TokenIteratorInterface;

/**
 * Class Parser
 *
 * @package Spress
 */
class Parser implements ParserInterface
{
    /**
     * @var LexerInterface
     */
    protected $lexer;

    /**
     * @var TokenIteratorInterface
     */
    protected $tokens = [];

    /**
     * Parser constructor.
     *
     * @param LexerInterface $lexer
     */
    public function __construct(LexerInterface $lexer)
    {
        $this->lexer = $lexer;
    }

    /**
     * @inheritdoc
     */
    public function parse(string $input): SExpression
    {
        $this->tokens = new TokenIterator($this->lexer->lex($input));

        return $this->nextSExpression();
    }

    /**
     * @return SExpression
     * @throws UnexpectedCharacterException
     */
    protected function nextSExpression(): SExpression
    {
        switch (get_class($this->tokens->peek())) {
            case EndOfInput::class:
                throw new UnexpectedCharacterException('EOF');
            case LeftPar::class:
                $this->tokens->eatLeftPar();
                $expr = $this->nextList();
                $this->tokens->eatRightPar();
                return $expr;
            case Integer::class:
                $int = $this->tokens->getNext();
                return new SInteger($int->value);
            case Id::class:
                $id = $this->tokens->getNext();
                return new SSymbol($id->value);
        }
    }

    /**
     * @return SExpression
     */
    protected function nextList(): SExpression
    {
        switch (get_class($this->tokens->peek())) {
            case RightPar::class:
                return new SNil;
            default:
                $head = $this->nextSExpression();
                $tail = $this->nextList();
                return new SCons($head, $tail);
        }
    }
}
