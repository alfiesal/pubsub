<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\ProducerInterface;
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

    public function publish(\Alfiesal\PubSub\Message $message, \Alfiesal\PubSub\Topic $topic): void
    {
        /**
         * @var AMQPMessage
         */
        $amqpMessage = $message->transportMessage();
        $amqpMessage->set('publisher', $this->name);

        $this->channel->basic_publish(
            $amqpMessage,
            $topic->name(),
            $message->name()
        );
    }
}
