<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;

class AppFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }
    public function load(ObjectManager $manager): void
    {
       $this->loadUsers($manager);
    }
    public function loadUsers(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; $i++){

            $user = new User();
            $user->setName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setEmail($this->faker->unique()->safeEmail);
            $user->setPassword($this->faker->password());
            $user->setCreatedAt(new \DateTimeImmutable());
            $user->setPhone($this->faker->phoneNumber);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
