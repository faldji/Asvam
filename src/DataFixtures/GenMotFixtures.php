<?php

namespace App\DataFixtures;

use App\Entity\GenMot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GenMotFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $mots = ["test", "Le pendu", "reactjs", "jeux", "je me forme en react"];

        foreach ($mots as $mot){
            $generatedMot = new GenMot();
            $generatedMot->setDisplay($mot);
            $manager->persist($generatedMot);
        }

        $manager->flush();
    }
}
