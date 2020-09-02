<?php

use Alfiesal\PubSub\MessageBus;
use Alfiesal\PubSub\Transport\AMQP\AMQPFactory;
use Alfiesal\PubSub\Transport\AMQP\Message;

require_once 'vendor/autoload.php';

$amqpTransport = AMQPFactory::create('amqp://guest:guest@localhost:8099');

$bus = new MessageBus($amqpTransport, 'mailing-microservice', [
    'event.user-microservice.user-attached' => [
        'handler' => static function(){
            echo 'Handler of event.user-microservice.user-attached'. PHP_EOL;
        }
    ],
    'event.user-microservice.user-registered' => [
        'handler' => static function(){
            echo 'Handler of event.user-microservice.user-registered'. PHP_EOL;
        }
    ],

]);
$bus->consume();