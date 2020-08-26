<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport;

use Alfiesal\PubSub\ContextInterface;

interface TransportInterface
{
    public function createContext(): ContextInterface;
}
