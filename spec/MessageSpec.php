<?php

namespace spec\Alfiesal\PubSub;

use Alfiesal\PubSub\Message;
use PhpSpec\ObjectBehavior;

class MessageSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('test');
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(Message::class);
    }
}
