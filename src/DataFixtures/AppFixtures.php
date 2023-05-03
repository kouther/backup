<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setName('name'.$i);
            $user->setLastname('lastname'.$i);
            $user->setEmail('user@gmail.com'.$i);
            $password = $this->hasher->hashPassword($user, 'koukou123');

            $user->setPassword($password. $i);
            $user->setCin(mt_rand(10000000, 99999999));
            $user->setBirth('tunis'.$i );
            $user->setDate(new \DateTime('now'));
            $manager->persist($user);
        }

        $manager->flush();


    }
}
