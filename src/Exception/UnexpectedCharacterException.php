<?php

namespace Spress\Exception;

/**
 * Class UnexpectedCharacter
 *
 * @package Spress\Exception
 */
class UnexpectedCharacterException extends \Exception
{
    /**
     * UnexpectedCharacter constructor.
     *
     * @param string $actualChar
     * @param string $expectedChar
     */
    public function __construct(string $actualChar, string $expectedChar = '')
    {
        $message = "Unexpected character encountered: '{$actualChar}'.";
        if (!empty($expectedChar)) {
            $message .= " Expected: '{$expectedChar}'";
        }

        parent::__construct($message);
    }
}
