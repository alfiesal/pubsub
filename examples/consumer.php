<?php

use Alfiesal\PubSub\MessageBus;
use Alfiesal\PubSub\Transport\AMQP\AMQPFactory;
use Alfiesal\PubSub\Transport\AMQP\Message;

require_once 'vendor/autoload.php';

$amqpTransport = AMQPFactory::create('amqp://guest:guest@localhost:8099');

$bus = new MessageBus($amqpTransport, 'mailing-microservice', [
    'event.user-microservice.user-registered' => function(){
        echo 1;
    }
]);
$bus->consume();