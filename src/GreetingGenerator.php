<?php
// src/GreetingGenerator.php

namespace App;

use Psr\Log\LoggerInterface;

class GreetingGenerator
{
    public function __construct(private readonly LoggerInterface $logger)
    {

    }
    public function getRandomGreeting(): string
    {
        $greetings = ['Hey', 'Yo', 'Aloha'];
        $greeting = $greetings[array_rand($greetings)];

        $this->logger->info('Using the greeting: '.$greeting);
        return $greeting;
    }
}