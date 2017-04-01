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

    /**
     * @param string $input
     * @return array
     */
    public function deserialize(string $input): array;
}
