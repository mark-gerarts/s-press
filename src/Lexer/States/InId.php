<?php

namespace Spress\Lexer\States;

use Spress\Exception\UnexpectedCharacterException;
use Spress\Lexer\Tokens\Id;

/**
 * Class InId
 *
 * @package Spress\Lexer\States
 */
class InId extends LexerState
{
    /**
     * @var string
     */
    protected $id;

    /**
     * InId constructor.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        if (in_array($char, ['(', ')', ';']) || $this->isWhitespace($char)) {
            $this->emit(new Id($this->id));
            return new StepBack;
        }

        return new InId($this->id . $char);
    }

    /**
     * @inheritdoc
     */
    public function processEOF(): LexerState
    {
        throw new UnexpectedCharacterException('EOF');
    }
}
