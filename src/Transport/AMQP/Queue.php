<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\Queue as BaseQueue;

class Queue extends BaseQueue
{
    private $passive;

    private $durable;

    private $exclusive;

    private $autoDelete;

    public function __construct(
        string $name,
        bool $passive = false,
        bool $durable = true,
        bool $exclusive = false,
        bool $autoDelete = false
    ) {
        parent::__construct($name);

        $this->passive = $passive;
        $this->durable = $durable;
        $this->exclusive = $exclusive;
        $this->autoDelete = $autoDelete;
    }

    public function passive(): bool
    {
        return $this->passive;
    }

    public function durable(): bool
    {
        return $this->durable;
    }

    public function exclusive(): bool
    {
        return $this->exclusive;
    }

    public function autoDelete(): bool
    {
        return $this->autoDelete;
    }
}
