<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

class Message implements MessageInterface
{
    private $name;

    private $headers;

    private $payload;

    public function __construct(string $name, array $payload, array $headers = [])
    {
        $this->name = $name;
        $this->payload = $payload;
        $this->headers = $headers;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function payload(): array
    {
        return $this->payload;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function header(string $name, $default = null)
    {
        return $this->headers[$name] ?? $default;
    }
}
