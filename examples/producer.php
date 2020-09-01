<?php

use Alfiesal\PubSub\MessageBus;
use Alfiesal\PubSub\Transport\AMQP\AMQPFactory;
use Alfiesal\PubSub\Transport\AMQP\Message;

require_once 'vendor/autoload.php';

$amqpTransport = AMQPFactory::create('amqp://guest:guest@localhost:8099');

$bus = new MessageBus($amqpTransport, 'user-microservice', []);
$bus->dispatch(new Message('event.user-microservice.user-registered',[
    'userId' => 1000,
    'firstName' => 'John',
    'lastName' => 'Doe'
]));