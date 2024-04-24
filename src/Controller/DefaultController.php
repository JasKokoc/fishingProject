<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public  function  index()
    {
        return $this->render('default/index.html.twig', [
        ]);
    }

}