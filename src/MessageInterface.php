<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface MessageInterface
{
    public function name(): string;

    public function payload(): array;

    public function headers(): array;

    public function header(string $name, $default = null);

    public function properties(): array;

    public function property(string $name, $default = null);
}
