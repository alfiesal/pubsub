<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

use DateTimeInterface;
use Ramsey\Uuid\Uuid;

class Message implements MessageInterface
{
    private $id;

    private $name;

    private $headers;

    private $payload;

    public function __construct(string $name, array $payload, array $headers = [])
    {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->payload = $payload;
        $this->headers = $headers;

        $this->headers['timestamp'] = (new \DateTime('now'))->format(DateTimeInterface::RFC3339_EXTENDED);
    }

    public function id(): string
    {
        return $this->id;
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

    public function addHeader(string $name, $value): void
    {
        $this->headers[$name] = $value;
    }
}
