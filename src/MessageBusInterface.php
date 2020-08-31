<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface MessageBusInterface
{
    public function dispatch(Message $message): void;

    public function consume(): void;
}
