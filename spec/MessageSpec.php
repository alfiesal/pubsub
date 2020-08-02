<?php

declare(strict_types=1);

namespace spec\Alfiesal\PubSub;

use Alfiesal\PubSub\Message;
use PhpSpec\ObjectBehavior;

class MessageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('test');
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Message::class);
    }
}
