<?php

namespace Spress\Lexer;

use Spress\Lexer\States\LexerState;
use Spress\StringIterator;

/**
 * Class Lexer
 *
 * @package Spress\Lexer
 */
class Lexer implements LexerInterface
{
    /**
     * @var LexerState
     */
    protected $state;

    /**
     * Lexer constructor.
     */
    public function __construct()
    {
        $this->state = LexerState::inWhitespace();
    }

    /**
     * @inheritdoc
     */
    public function lex(string $input): array
    {
        $input = new StringIterator($input);

        foreach ($input as $char) {
            // dostuff
        }

        return [];
    }


}