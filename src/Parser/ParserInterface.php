<?php

namespace Spress\Parser;

/**
 * Interface ParserInterface
 *
 * @package Spress\Parser
 */
interface ParserInterface
{
    /**
     * @param string $input
     * @return array
     */
    public function parse(string $input): array;
}
