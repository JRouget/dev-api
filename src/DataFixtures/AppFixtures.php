<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher,
    ) {}

    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();

        // Alice
        $alice = new User();
        $alice->setEmail('alice@example.fr');
        $alice->setPassword($this->hasher->hashPassword($alice, 'motdepasse'));
        $alice->setCreatedAt($now);
        $manager->persist($alice);

        // Bob
        $bob = new User();
        $bob->setEmail('bob@example.fr');
        $bob->setPassword($this->hasher->hashPassword($bob, 'motdepasse'));
        $bob->setCreatedAt($now);
        $manager->persist($bob);

        // Camille
        $camille = new User();
        $camille->setEmail('camille.aubert@example.fr');
        $camille->setPassword($this->hasher->hashPassword($camille, 'motdepasse'));
        $camille->setFirstName('Camille');
        $camille->setLastName('Aubert');
        $camille->setCreatedAt(new \DateTimeImmutable('2026-02-04'));
        $manager->persist($camille);

        $manager->flush();
    }
}
