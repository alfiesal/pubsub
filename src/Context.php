<?php

declare(strict_types=1);

namespace Alfiesal\PubSub;

interface Context
{
    public function createTopic(string $name): Topic;

    public function createQueue(string $name): Queue;

    public function bind(Queue $queue, Topic $topic);

    public function createProducer(string $name): Producer;

    public function createConsumer(string $name): void;
}
