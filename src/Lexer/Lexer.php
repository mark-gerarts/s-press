<?php

namespace Spress\Lexer;

use Spress\Lexer\States\LexerState;
use Spress\Lexer\States\StepBack;
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
     * @var array
     */
    protected $tokens = [];

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
            $this->processChar($char);
        }

        $tokens = $this->tokens;
        $this->tokens = [];

        return $tokens;
    }

    /**
     * @param string $char
     */
    protected function processChar(string $char)
    {
        $currentState = $this->state;
        $nextState = $this->state->process($char);
        $this->state = $nextState;

        $token = $currentState->getToken();
        if ($token) {
            $this->tokens[] = $token;
        }

        if ($this->state instanceof StepBack) {
            $this->processChar($char);
        }
    }
}
