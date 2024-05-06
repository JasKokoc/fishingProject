<?php
namespace App\Service;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher,
    )
    {}

    public function registerUser(?User $user = null)
    {
        $user = !$user ? new User() : $user;
        $user->setPassword(
            $this->passwordHasher->hashPassword(
                $user,
                $user->getPassword()
            )
        );
        $user->setCreatedAt(new \DateTimeImmutable());


        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

}