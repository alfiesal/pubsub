<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\ConsumerInterface;
use Alfiesal\PubSub\ContextInterface;
use Alfiesal\PubSub\ProducerInterface;
use Alfiesal\PubSub\Queue;
use Alfiesal\PubSub\Topic;
use Alfiesal\PubSub\Transport\AMQP\Queue as AMQPQueue;
use Alfiesal\PubSub\Transport\AMQP\Topic as AMQPTopic;
use PhpAmqpLib\Channel\AMQPChannel;

class Context implements ContextInterface
{
    /**
     * @var AMQPChannel
     */
    private $channel;

    public function __construct(AMQPChannel $channel)
    {
        $this->channel = $channel;
    }

    public function createTopic(string $name = 'amq.topic'): Topic
    {
        return new AMQPTopic($name);
    }

    public function declareTopic(AMQPTopic $topic): void
    {
        $this->channel->exchange_declare(
            $topic->name(),
            $topic->type(),
            $topic->passive(),
            $topic->durable(),
        );
    }

    public function createQueue(string $name): Queue
    {
        return new AMQPQueue($name);
    }

    public function declareQueue(Queue $queue): void
    {
        $this->channel->queue_declare(
            $queue->name(),
            $queue->passive(),
            $queue->durable(),
            $queue->exclusive(),
            $queue->autoDelete()
        );
    }

    public function bind(Queue $queue, Topic $topic, string $routingKey): void
    {
        $this->channel->queue_bind(
            $queue->name(),
            $topic->name(),
            $routingKey
        );
    }

    public function createProducer(string $name): ProducerInterface
    {
        return new Producer($name, $this->channel);
    }

    public function createConsumer(): ConsumerInterface
    {
        return new Consumer($this->channel);
    }
}
