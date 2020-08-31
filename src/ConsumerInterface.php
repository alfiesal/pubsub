<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface ConsumerInterface
{
    public function consume(Queue $queue, array $bindings): void;
}
