<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

class Message implements MessageInterface
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
