<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

class Queue
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
