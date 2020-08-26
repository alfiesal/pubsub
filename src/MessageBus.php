<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

use Alfiesal\PubSub\Transport\TransportInterface;

class MessageBus implements MessageBusInterface
{
    private $transport;

    private $producerName;

    public function __construct(TransportInterface $transport, string $producerName)
    {
        $this->transport = $transport;
        $this->producerName = $producerName;
    }

    public function dispatch(Message $message): void
    {
        $context = $this->transport->createContext();
        $producer = $context->createProducer($this->producerName);

        $producer->dispatch($message, $context->createTopic());
    }
}
