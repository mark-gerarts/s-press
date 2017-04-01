<?php

namespace Spress\Lexer\States;

use Spress\Lexer\Tokens\Integer;

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

        $this->emit(new Integer((int) $this->number));

        // We have to return a StepBack state because the character has to be
        // processed again.
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
