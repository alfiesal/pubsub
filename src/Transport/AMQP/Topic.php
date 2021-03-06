<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\Topic as BaseTopic;
use Alfiesal\PubSub\Transport\AMQP\Exceptions\InvalidTopicType;

class Topic extends BaseTopic
{
    public const VALID_TYPES = [
        'direct',
        'fanout',
        'topic',
        'headers',
    ];

    private $type;

    private $passive;

    private $durable;

    public function __construct(
        string $name = 'amq.topic',
        string $type = 'topic',
        bool $passive = false,
        bool $durable = true
    ) {
        if (!in_array($type, self::VALID_TYPES)) {
            throw new InvalidTopicType($type);
        }
        parent::__construct($name);

        $this->type = $type;
        $this->passive = $passive;
        $this->durable = $durable;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function passive(): bool
    {
        return $this->passive;
    }

    public function durable(): bool
    {
        return $this->durable;
    }
}
