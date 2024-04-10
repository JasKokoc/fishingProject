<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    #[Route('/users', name: 'user_list')]
    public function users(): Response
    {
        $users = $this->userRepository->findAll();

        return $this->render('user/index.html.twig', ['users' => $users]);
    }
    #[Route("/users/{id}", name: "user_show")]
    public function user(User $user): Response
    {
        return $this->render('user/show.html.twig', ['user' => $user]);
    }
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
