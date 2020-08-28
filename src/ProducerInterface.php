<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface ProducerInterface
{
    public function dispatch(MessageInterface $message, Topic $topic): void;
}
