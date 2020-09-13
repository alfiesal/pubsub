<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

use Alfiesal\PubSub\Transport\TransportInterface;

class MessageBus implements MessageBusInterface
{
    private $producer;

    private $consumer;

    private $topic;

    private $queue;

    private $bindings;

    public static function create(
        TransportInterface $transport,
        string $serviceName,
        array $bindings
    ): self
    {
        $context = $transport->createContext();

        $producer = $context->createProducer($serviceName);
        $consumer = $context->createConsumer();
        $queue = $context->createQueue($serviceName);
        $context->declareQueue($queue);
        $topic = $context->createTopic();

        foreach ($bindings as $routingKey => $handler) {
            $context->bind($queue, $topic, $routingKey);
        }

        return new self($producer, $consumer, $topic, $queue, $bindings);
    }

    private function __construct(
        ProducerInterface $producer,
        ConsumerInterface $consumer,
        Topic $topic,
        Queue $queue,
        array $bindings
    ) {
        $this->producer = $producer;
        $this->consumer = $consumer;
        $this->topic = $topic;
        $this->queue = $queue;
        $this->bindings = $bindings;
    }

    public function dispatch(Message $message): void
    {
        $this->producer->dispatch($message, $this->topic);
    }

    public function consume(): void
    {
        $this->consumer->consume($this->queue, $this->bindings);
    }
}
