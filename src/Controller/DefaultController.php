<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\GreetingGenerator;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    #[Route('/api/hello/{name}', methods: ['GET'])]
    public  function  apiHello(string $name): JsonResponse
    {
        return $this->json([
           'name' => $name,
           'symfony' => 'rocks',
        ]);
    }

    #[Route('/hello/{name}', methods: ['GET'])]
    public function index(string $name, LoggerInterface $logger, GreetingGenerator $generator): Response
    {
        $greeting = $generator->getRandomGreeting();

        $logger->info("Saying $greeting to $name!");
        return $this->render('default/index.html.twig', [
            'name' => $name, 'greet' => $greeting,
        ]);
    }

    #[Route('/simplicity', methods: ['GET'])]
    public function simple(): Response
    {
        return new Response('Simple! Easy! Great!');
    }
}