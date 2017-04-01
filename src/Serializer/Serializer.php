<?php

namespace Spress\Serializer;

use Spress\Parser\ParserInterface;

/**
 * Class Serializer
 *
 * @package Spress\Serializer
 */
class Serializer implements SerializerInterface
{
    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * Serializer constructor.
     *
     * @param ParserInterface $parser
     */
    public function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @inheritdoc
     */
    public function serialize(array $data): string
    {
        return '()';
    }

    /**
     * @inheritdoc
     */
    public function deserialize(string $input): array
    {
        return [];
    }
}
