<?php

declare(strict_types=1);

namespace spec\Alfiesal\PubSub;

use Alfiesal\PubSub\Queue;
use PhpSpec\ObjectBehavior;

class QueueSpec extends ObjectBehavior
{
    private const QUEUE_NAME = 'queue-name';

    public function let()
    {
        $this->beConstructedWith(self::QUEUE_NAME);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Queue::class);
    }

    public function it_returns_name(): void
    {
        $this->name()->shouldBe(self::QUEUE_NAME);
    }
}
