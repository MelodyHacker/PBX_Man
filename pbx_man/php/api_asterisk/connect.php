<?php

// Make sure you include the composer autoload.
require __DIR__ . '/vendor/autoload.php';

$options = array(
    'host' => '2.3.4.5',
    'scheme' => 'tcp://',
    'port' => 9999,
    'username' => 'asd',
    'secret' => 'asd',
    'connect_timeout' => 10,
    'read_timeout' => 10
);
$client = new \PAMI\Client\Impl\ClientImpl($options);

// Registering a closure
$client->registerEventListener(function ($event) {
});

// Register a specific method of an object for event listening
$client->registerEventListener(array($listener, 'handle'));

// Register an IEventListener:
$client->registerEventListener($listener);


?>
