<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

use Alfiesal\PubSub\Transport\TransportInterface;

class MessageBus implements MessageBusInterface
{
    private $transport;

    private $producerName;

    private $bindings;

    public function __construct(
        TransportInterface $transport,
        string $producerName,
        array $bindings
    ) {
        $this->transport = $transport;
        $this->producerName = $producerName;
        $this->bindings = $bindings;
    }

    public function dispatch(Message $message): void
    {
        $context = $this->transport->createContext();
        $producer = $context->createProducer($this->producerName);

        $producer->dispatch($message, $context->createTopic());
    }

    public function consume(): void
    {
        $context = $this->transport->createContext();
        $consumer = $context->createConsumer();

        $queue = new \Alfiesal\PubSub\Transport\AMQP\Queue('mailing-microservice');
        $context->declareQueue($queue);

        foreach ($this->bindings as $event => $handler) {
            $topic = new \Alfiesal\PubSub\Transport\AMQP\Topic();
            $context->bind($queue, $topic, $event);
        }

        $consumer->consume($queue, $this->bindings);
    }
}
