<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\MessageInterface;
use Alfiesal\PubSub\ProducerInterface;
use Alfiesal\PubSub\Topic as BaseTopic;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class Producer implements ProducerInterface
{
    /**
     * @var AMQPChannel
     */
    private $channel;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $name, AMQPChannel $channel)
    {
        $this->channel = $channel;
        $this->name = $name;
    }

    public function dispatch(MessageInterface $message, BaseTopic $topic): void
    {
        $message->addHeader('producer', $this->name);

        /** @var AMQPMessage */
        $amqpMessage = $message->transportMessage();

        $this->channel->basic_publish(
            $amqpMessage,
            $topic->name(),
            $message->name()
        );
    }
}
