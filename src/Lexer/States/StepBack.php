<?php

namespace Spress\Lexer\States;

/**
 * Class StepBack.
 *
 * This state is used to indicate a character should be processed again. This is
 * needed for example in InNumeric.
 *
 * @package Spress\Lexer\States
 */
class StepBack extends InWhitespace
{
    //
}
