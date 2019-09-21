<?php


namespace App\Controller;


use App\Entity\GenMot;
use Doctrine\Common\Persistence\ObjectManager;

class ApiGenMotAction
{
    public function __construct( )
    {

    }
    public function __invoke(ObjectManager $manager):GenMot
    {
        $data = $manager->getRepository(GenMot::class)->findAll();
        $ran = array_rand($data);
        $str =$data[$ran]->getDisplay();
        $newstr = preg_replace('/[\w\/g]/', '-', $str);
        $data[$ran]->setDisplay($newstr);
        return $data[$ran];

    }
}
