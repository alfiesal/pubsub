<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\ConsumerInterface;
use Alfiesal\PubSub\Queue;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class Consumer implements ConsumerInterface
{
    private $channel;

    public function __construct(AMQPChannel $channel)
    {
        $this->channel = $channel;
    }

    public function consume(Queue $queue, array $bindings): void
    {
        $this->channel->basic_consume(
            $queue->name(),
            '',
            false,
            false,
            false,
            false,
            function (AMQPMessage $message) use ($bindings) {
                $this->messageHandler($message, $bindings);
            }
        );

        while (true) {
            $this->channel->wait(null, false, 1);
        }
    }

    public function messageHandler(AMQPMessage $message, array $bindings): void
    {
        $message->ack();
    }
}
