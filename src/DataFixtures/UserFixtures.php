<?php

namespace App\DataFixtures;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
  
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("user@yahoo.com");
        $password = $this->hasher->hashPassword($user, '123456');
        $user->setPassword($password);
  
        $manager->persist($user);
        $manager->flush();
    }
}
