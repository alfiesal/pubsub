<?php

use Alfiesal\PubSub\MessageBus;
use Alfiesal\PubSub\Transport\AMQP\AMQPFactory;
use Alfiesal\PubSub\Transport\AMQP\Message;

require_once 'vendor/autoload.php';

$amqpTransport = AMQPFactory::create('amqp://guest:guest@localhost:8099');

$bus = new MessageBus($amqpTransport, 'user-microservice', []);
$message = new Message('event.user-microservice.user-registered',[
    'userId' => 1000,
    'firstName' => 'John',
    'lastName' => 'Doe'
]);
$bus->dispatch($message);

echo $message->name() .PHP_EOL;
echo $message->id() .PHP_EOL;
var_dump($message->payload());
var_dump($message->headers());