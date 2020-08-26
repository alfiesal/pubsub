<?php

declare(strict_types=1);

namespace spec\Alfiesal\PubSub;

use Alfiesal\PubSub\Message;
use PhpSpec\ObjectBehavior;

final class MessageSpec extends ObjectBehavior
{
    private const NAME = 'name';
    private const PAYLOAD = ['key' => 'value'];
    private const HEADERS = [
        'header-name-1' => 'header-value-1',
        'header-name-2' => 'header-value-2',
    ];

    public function let()
    {
        $this->beConstructedWith(self::NAME, self::PAYLOAD, self::HEADERS);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Message::class);
    }

    public function it_returns_name(): void
    {
        $this->name()->shouldBe('name');
    }

    public function it_returns_payload(): void
    {
        $this->payload()->shouldBe(self::PAYLOAD);
    }

    public function it_returns_headers(): void
    {
        $this->headers()->shouldBe(self::HEADERS);
    }

    public function it_returns_header(): void
    {
        $this->header('header-name-1')->shouldBe('header-value-1');
    }

    public function it_returns_default_value_when_header_does_not_exist(): void
    {
        $this->header('name', 'default-value')->shouldBe('default-value');
    }
}
