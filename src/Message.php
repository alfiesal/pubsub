<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

class Message implements MessageInterface
{
    private $name;

    private $headers;

    private $properties;

    private $payload;

    public function __construct(string $name, array $payload, array $headers = [], array $properties = [])
    {
        $this->name = $name;
        $this->payload = $payload;
        $this->headers = $headers;
        $this->properties = $properties;
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

    public function properties(): array
    {
        return $this->properties;
    }

    public function property(string $name, $default = null)
    {
        return $this->properties[$name] ?? $default;
    }
}
