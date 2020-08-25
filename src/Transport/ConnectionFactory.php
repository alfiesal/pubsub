<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface ConnectionFactory
{
    public function createContext();
}
