<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP;

use Alfiesal\PubSub\ContextInterface;
use Alfiesal\PubSub\Transport\TransportInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class AMQPFactory implements TransportInterface
{
    private $connection;

    public static function create(string $connectionUri): self
    {
        $config = parse_url($connectionUri);

        $connection = new AMQPStreamConnection(
            $config['host'],
            (string) $config['port'],
            $config['user'],
            $config['pass'],
        );

        return new self($connection);
    }

    private function __construct(AMQPStreamConnection $connection)
    {
        $this->connection = $connection;
    }

    public function createContext(): ContextInterface
    {
        $channel = $this->connection->channel();
        $channel->basic_qos(null, 50, null);

        return new Context($channel);
    }
}
