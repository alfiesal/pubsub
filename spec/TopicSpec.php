<?php

declare(strict_types=1);

namespace spec\Alfiesal\PubSub;

use Alfiesal\PubSub\Topic;
use PhpSpec\ObjectBehavior;

class TopicSpec extends ObjectBehavior
{
    private const TOPIC_NAME = 'topic-name';

    public function let()
    {
        $this->beConstructedWith(self::TOPIC_NAME);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Topic::class);
    }

    public function it_returns_name(): void
    {
        $this->name()->shouldBe(self::TOPIC_NAME);
    }
}
