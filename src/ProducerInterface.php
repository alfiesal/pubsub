<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface ProducerInterface
{
    public function publish(Message $message, Topic $topic): void;
}
