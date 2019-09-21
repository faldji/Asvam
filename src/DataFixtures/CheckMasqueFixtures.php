<?php

namespace App\DataFixtures;

use App\Entity\CheckMot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CheckMasqueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $masque = new CheckMot();
        $masque->setNewMasque("----");
        $masque->setIsMotOk(false);
        $masque->setIsEnded(false);
        $manager->persist($masque);

        $manager->flush();
    }
}
