<?php

namespace Spress\Parser;

use Spress\Forms\SExpression;

/**
 * Interface ParserInterface
 *
 * @package Spress\Parser
 */
interface ParserInterface
{
    /**
     * @param string $input
     * @return SExpression
     */
    public function parse(string $input): SExpression;
}
