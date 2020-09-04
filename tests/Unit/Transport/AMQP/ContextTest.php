<?php

namespace Alfiesal\PubSub\Tests\Unit\Transport\AMQP;

use Alfiesal\PubSub\Transport\AMQP\Consumer;
use Alfiesal\PubSub\Transport\AMQP\Context;
use Alfiesal\PubSub\Transport\AMQP\Producer;
use Alfiesal\PubSub\Transport\AMQP\Queue;
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

    public function test_declare_topic(): void
    {
        $channelMock = $this->createMock(AMQPChannel::class);
        $channelMock->expects(self::once())
            ->method('exchange_declare')
            ->with(
                self::equalTo('amq.topic'),
                self::equalTo('topic'),
                self::isFalse(),
                self::isTrue(),
            );

        $context = new Context($channelMock);

        $context->declareTopic(new Topic());
    }

    public function test_create_queue(): void
    {
        $context = new Context($this->createMock(AMQPChannel::class));

        $queue = $context->createQueue('queue-name');

        self::assertInstanceOf(Queue::class, $queue);
    }

    public function test_declare_queue(): void
    {
        $channelMock = $this->createMock(AMQPChannel::class);
        $channelMock->expects(self::once())
            ->method('queue_declare')
            ->with(
                self::equalTo('queue-name'),
                self::isFalse(),
                self::isTrue(),
                self::isFalse(),
                self::isFalse()
            );

        $context = new Context($channelMock);
        $context->declareQueue(new Queue('queue-name'));
    }

    public function test_bind(): void
    {
        $channelMock = $this->createMock(AMQPChannel::class);
        $channelMock->expects(self::once())
            ->method('queue_bind')
            ->with(
                self::equalTo('queue-name'),
                self::equalTo('topic-name'),
                self::equalTo('routing-key'),
            );

        $context = new Context($channelMock);

        $context->bind(new Queue('queue-name'), new Topic('topic-name'), 'routing-key');
    }

    public function test_create_producer(): void
    {
        $context = new Context($this->createMock(AMQPChannel::class));

        $producer = $context->createProducer('producer-name');

        self::assertInstanceOf(Producer::class, $producer);
    }

    public function test_create_consumer(): void
    {
        $context = new Context($this->createMock(AMQPChannel::class));

        $consumer = $context->createConsumer();

        self::assertInstanceOf(Consumer::class, $consumer);
    }
}
