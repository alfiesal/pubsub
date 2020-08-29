<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\Message as BaseMessage;
use PhpAmqpLib\Message\AMQPMessage;

class Message extends BaseMessage
{
    public function transportMessage(): AMQPMessage
    {
        return new AMQPMessage(
            json_encode($this->payload()),
            [
                'content_type' => 'application/json',
                'content_encoding' => 'utf-8',
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
                'application_headers' => $this->headers(),
            ]
        );
    }
}
