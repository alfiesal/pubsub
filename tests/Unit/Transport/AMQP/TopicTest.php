<?php declare(strict_types=1);

namespace Alfiesal\PubSub\Tests\Unit\Transport\AMQP;

use Alfiesal\PubSub\Transport\AMQP\Exceptions\InvalidTopicType;
use Alfiesal\PubSub\Transport\AMQP\Topic;
use PHPUnit\Framework\TestCase;

final class TopicTest extends TestCase
{
    /**
     * @dataProvider allowedTypesProvider
     */
    public function test_creating_using_valid_type(string $type) : void
    {
        self::assertInstanceOf(Topic::class, new Topic('test', $type));
    }

    public function allowedTypesProvider(): \Generator
    {
        yield ['direct'];
        yield ['fanout'];
        yield ['topic'];
        yield ['headers'];
    }

    public function test_creating_using_not_invalid_type(): void
    {
        $this->expectException(InvalidTopicType::class);
        $this->expectExceptionMessage(
            'Invalid AMQP topic(exchange) type. Passed type test, instead of one of direct,fanout,topic,headers'
        );

        new Topic('test','test');
    }
}