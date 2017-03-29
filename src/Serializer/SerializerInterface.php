<?php

namespace Spress\Serializer;

/**
 * Interface SerializerInterface
 *
 * @package Spress\Serializer
 */
interface SerializerInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function serialize(array $data): string;
}
