<?php
// src/Twig/GreetExtension.php

namespace App\Twig;

use App\GreetingGenerator;
use App\Extension\AbstractExtension;
use Twig\TwigFilter;

class GreetExtension extends AbstractExtension
{
    public function __construct(private readonly GreetingGenerator $greetingGenerator)
    {
    }

    public function getFilters()
    {
        return [
            new TwigFilter('greet', [$this, 'greetUser']),
        ];
    }

    public function greetUser(string $name): string
    {
        $greeting =  $this->greetingGenerator->getRandomGreeting();

        return "$greeting $name!";
    }
}
