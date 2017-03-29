<?php

namespace Spress\Serializer;

/**
 * Class Serializer
 *
 * @package Spress\Serializer
 */
class Serializer implements SerializerInterface
{
    /**
     * @inheritdoc
     */
    public function serialize(array $data): string
    {
        return '()';
    }
}
