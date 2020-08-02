<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface MessageInterface
{
    public function name(): string;
}
