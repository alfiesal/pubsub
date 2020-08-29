<?php

namespace Alfiesal\PubSub\Tests\Unit\Transport\AMQP;

use Alfiesal\PubSub\Transport\AMQP\Context;
use Alfiesal\PubSub\Transport\AMQP\Topic;
use PhpAmqpLib\Channel\AMQPChannel;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function test_create_topic(): void
    {
        $context = new Context($this->createMock(AMQPChannel::class));

        $topic = $context->createTopic('topic-name');

        self::assertInstanceOf(Topic::class, $topic);
    }
}
