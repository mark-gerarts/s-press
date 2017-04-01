<?php

namespace Spress\Lexer\States;

use Spress\Lexer\Tokens\INTEGER;

/**
 * Class InNumeric
 *
 * @package Spress\Lexer\States
 */
class InNumeric extends LexerState
{
    /**
     * @var string
     */
    protected $number = '';

    /**
     * InNumeric constructor.
     *
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * @inheritdoc
     */
    public function process(string $char): LexerState
    {
        if (is_numeric($char)) {
            return new InNumeric($this->number . $char);
        }

        $this->emit(new INTEGER((int) $this->number));

        return new StepBack;
    }

    /**
     * @inheritdoc
     */
    public function processEOF(): LexerState
    {
        return new Done;
    }
}
