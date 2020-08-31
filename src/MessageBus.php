<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

use Alfiesal\PubSub\Transport\TransportInterface;

class MessageBus implements MessageBusInterface
{
    private $transport;

    private $serviceName;

    private $bindings;

    public function __construct(
        TransportInterface $transport,
        string $serviceName,
        array $bindings
    ) {
        $this->transport = $transport;
        $this->serviceName = $serviceName;
        $this->bindings = $bindings;
    }

    public function dispatch(Message $message): void
    {
        $context = $this->transport->createContext();
        $producer = $context->createProducer($this->serviceName);

        $producer->dispatch($message, $context->createTopic());
    }

    public function consume(): void
    {
        $context = $this->transport->createContext();
        $consumer = $context->createConsumer();

        $topic = $context->createTopic();
        $queue = $context->createQueue($this->serviceName);
        $context->declareQueue($queue);

        foreach ($this->bindings as $routingKey => $handler) {
            $context->bind($queue, $topic, $routingKey);
        }

        $consumer->consume($queue, $this->bindings);
    }
}
