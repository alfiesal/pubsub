<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface ContextInterface
{
    public function createTopic(string $name = ''): Topic;

    public function createQueue(string $name): Queue;

    public function bind(Queue $queue, Topic $topic): void;

    public function createProducer(string $name): ProducerInterface;

    public function createConsumer(string $name): void;
}
