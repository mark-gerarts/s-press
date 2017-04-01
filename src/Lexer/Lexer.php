<?php

namespace Spress\Lexer;

use Spress\Lexer\States\InWhitespace;
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
        // InWhiteSpace is the default state.
        $this->state = new InWhitespace;
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

        // Reset the tokens so that the state isn't remembered.
        $tokens = $this->tokens;
        $this->tokens = [];

        return $tokens;
    }

    /**
     * @param string $char
     */
    protected function processChar(string $char)
    {
        $previousState = $this->state;
        $newState = $this->state->process($char);
        $this->state = $newState;

        // getToken() will only return a value if the state emitted a token.
        $token = $previousState->getToken();
        if ($token) {
            $this->tokens[] = $token;
        }

        // Process the character again if needed.
        if ($this->state instanceof StepBack) {
            $this->processChar($char);
        }
    }
}
