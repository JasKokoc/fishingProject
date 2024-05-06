<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\UserService;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration')]
    public function index(
        Request $request,
        UserService $userService,
    ): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if(!$form->isSubmitted() || !$form->isValid()){
            return $this->render('registration/register.html.twig', [
                'controller_name' => 'RegistrationController',
                'form' => $form->createView(),
            ]);
        }

        $userService->registerUser($user);
        return $this->redirectToRoute('app_profile');
    }

}
