<?php declare(strict_types=1);

namespace Alfiesal\PubSub\Tests\Unit\Transport\AMQP;

use Alfiesal\PubSub\Transport\AMQP\Message;
use Alfiesal\PubSub\Transport\AMQP\Producer;
use Alfiesal\PubSub\Transport\AMQP\Topic;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;
use PHPUnit\Framework\TestCase;

final class ProducerTest extends TestCase
{
    public function test_apply_producer_name_to_message() : void
    {
        $messageMock = $this->createMock(Message::class);

        $messageMock->expects(self::once())
            ->method('addHeader')
            ->with(self::equalTo('producer'), self::equalTo('producer-name'));

        $producer = new Producer('producer-name', $this->createMock(AMQPChannel::class));

        $producer->dispatch($messageMock, new Topic());
    }

    public function test_message_dispatching(): void
    {
        $channelMock = $this->createMock(AMQPChannel::class);

        $channelMock->expects(self::once())
            ->method('basic_publish')
            ->with(
                self::isInstanceOf(AMQPMessage::class),
                self::equalTo('amqp.topic'),
                self::equalTo('message-name'),
            );

        $producer = new Producer('producer-name', $channelMock);

        $producer->dispatch(new Message('message-name', []), new Topic('amqp.topic'));
    }
}