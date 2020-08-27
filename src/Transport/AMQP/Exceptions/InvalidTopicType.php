<?php

declare(strict_types=1);

namespace Alfiesal\PubSub\Transport\AMQP\Exceptions;

use Alfiesal\PubSub\Transport\AMQP\Topic;
use PhpSpec\Exception\Exception;

class InvalidTopicType extends Exception
{
    public function __construct(string $topicType)
    {
        $message = sprintf(
            'Invalid AMQP topic(exchange) type. Passed type %s, instead of one of %s',
            $topicType,
            implode(',', Topic::VALID_TYPES)
        );

        parent::__construct($message);
    }
}
